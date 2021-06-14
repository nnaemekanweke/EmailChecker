<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\EmailCheckerApiRequestController;
use App\Http\Controllers\FlutterwaveController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
Route::get('/', function () {
    return view('welcome');
});

*/

Route::get('/', [HomePageController::class, 'index'])->name('homepage');
Route::get('/about', [HomePageController::class, 'about'])->name('about');
Route::get('/contact', [HomePageController::class, 'contact'])->name('contact');
Route::get('/privacy-policy', [HomePageController::class, 'privacy'])->name('privacy');
Route::get('/tip-me', [HomePageController::class, 'support'])->name('support');


Route::get('/check', [HomePageController::class, 'index'])->name('homepage');
Route::post('/check', [EmailCheckerApiRequestController::class, 'verify'])->name('check');

Route::get('/check/{id}', [EmailCheckerApiRequestController::class, 'getPostById'])->name('getPostById');
Route::get('/add-post', [EmailCheckerApiRequestController::class, 'postById'])->name('postById');
Route::get('/update-post/{id}', [EmailCheckerApiRequestController::class, 'updateById'])->name('updateById');

// The route that the button calls to initialize payment
Route::post('/pay', [FlutterwaveController::class, 'initialize'])->name('pay');
// The callback url after a payment
Route::get('/rave/callback', [FlutterwaveController::class, 'callback'])->name('callback');
Route::get('/tip-me/success', function () {
    return view('frontend.success');
})->name('success');
Route::get('/tip-me/failed', [FlutterwaveController::class, 'failed'])->name('failed');




// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
