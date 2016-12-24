<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
    	return view("pages.index")
    			->with('text','<b>Laravel</b>')
    		;
    }
    public function profile()
    {
    	return view('pages.profile');
    }
    public function settings()
    {
    	return view('pages.settings');
    }
    public function blade()
    {
    	$gender = 'male';
    	$text = 'Hello, there!';
    	return view('blade.bladetest',compact('gender','text'));
    }
}
