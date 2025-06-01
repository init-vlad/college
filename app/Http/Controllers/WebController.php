<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function specialities()
    {
        return view('pages.specialities');
    }

    public function advantages()
    {
        return view('pages.advantages');
    }

    public function grants()
    {
        return view('pages.grants');
    }

    public function about()
    {
        return view('pages.about');
    }
}
