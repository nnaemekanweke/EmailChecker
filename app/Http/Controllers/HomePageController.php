<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Email;
use App\Models\User;

class HomePageController extends Controller
{
    public function index()
    {
        return view('frontend.homepage');
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function privacy()
    {
        return view('frontend.privacy');
    }

    public function support()
    {
        return view('frontend.support');
    }
}
