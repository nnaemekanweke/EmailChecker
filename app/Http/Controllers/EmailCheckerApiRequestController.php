<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use \GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;
use App\Models\Email;

class EmailCheckerApiRequestController extends Controller
{
    public function verify(Request $request)
    {
        $response = Http::withHeaders([
            // Api credentials from RapidAPI
            'X-RapidAPI-Key' => env('RAPIDAPI_KEY'),
            'X-RapidAPI-Host' => env('RAPIDAPI_HOST'),
            'Accept' => 'application/json'

        ])->get(env('RAPIDAPI_URL'), [
           //Collect input data from view
           'email' => $request->email,
        ]);
        Log::info($response);

        // Get payload in collection or ->body()
        $body = $response->collect();
        $data = json_decode($body, true);

        // Check if email is valid and then store in database
        if($data['status'] === 'valid')
        {
            // Check if email exist in database
            $newEmail = Email::where('email', '=', $data['email'])->first();
           // Save validated email to database if not already exist.
            if ($newEmail === null) {
                Email::create([
                    'email' => $data['email'],
                    'user' => $data['user'],
                    'domain' => $data['domain'],
                    'status' => $data['status'],
                    'reason' => $data['reason'],
                    'disposable' => $data['disposable'],
                ]);
            }
        Log::info('New Email saved to database');
        // return to view
        return view('frontend.homepage', compact('data'));
       // return $reponse->json();


    }

//     public function check() {

//      $response = Http::get('https://jsonplaceholder.typicode.com/posts');
//      return $response->json();
//    }

//    public function getPostById($id)
//    {
//     $response = Http::get('https://jsonplaceholder.typicode.com/posts/'.$id);
//     return $response->json();
//    }

//    public function postById()
//    {
//     $post = Http::post('https://jsonplaceholder.typicode.com/posts/',[
//         'userId' => 1,
//         'title' => 'New Post Title',
//         'body' => 'This is a new body texts'
//      ]);
//      return $post->json();
//    }

//    public function updateById($id)
//    {
//     $response = Http::put('https://jsonplaceholder.typicode.com/posts/'.$id,[
//         'title' => 'Updated Post Title ' . $id,
//         'body' => 'This is a new body texts'
//      ]);
//      return $response->json();
//    }

}
