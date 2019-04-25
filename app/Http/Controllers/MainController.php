<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function createRegistration()
    {
    	return view('pages.registration');
    }
}
