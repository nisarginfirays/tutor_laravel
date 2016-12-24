<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Http\Requests;
use App\User;
class UserController extends Controller
{
    public function index()
	{
		$users = User::paginate(10);
		
		//dd($user);
		return view('admin.user.index',compact('users'));		
	}
	public function create()
	{
		return view('admin.user.create');
	}
	public function store(Request $request)
	{
		User::create($request->all());
		return 'success';
	}
}
