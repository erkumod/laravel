<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TermController extends Controller
{
    public function showtnc()
    {
    	return view('terms_condn');
    }

    public function showprivacy()
    {
    	return view('privacy');
    }
}
