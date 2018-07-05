<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function contact(){
    	return view('contactus');
    }
    public function about(){
    	return view('aboutus');
    }
}
