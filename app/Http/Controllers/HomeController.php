<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
        /**
     * Show the application's welcome page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home'); // Replace 'welcome' with the actual view you want to display
    }
}
