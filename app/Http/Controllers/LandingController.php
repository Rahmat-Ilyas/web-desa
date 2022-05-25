<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function home()
    {
        return view('landing/home');
    }

    public function page($page)
    {
        return view('landing/' . $page);
    }

    public function pagedir($dir = NULL, $page)
    {
        return view('landing/' . $dir . '/' . $page);
    }
}
