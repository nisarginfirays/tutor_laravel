<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
class AdminController extends Controller
{
	public function index()
	{
		$user = [
			'0' => [
				'firstname' => 'nisarg',
				'lastname' => 'bhavsar',
				'location' => 'anand'
			],
			'1' => [
				'firstname' => 'kuldeep',
				'lastname' => 'patel',
				'location' => 'vadodara'
			]
		];
		//dd($user);
		return view('admin.user.index',compact('user'));		
	}
	public function create()
	{
		
	}
}
