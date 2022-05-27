<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;

class UserController extends Controller
{
	public function home(){
		$user = User::findOrFail(Auth::id());
		return view('users.home', compact('user'));
	}
	public function skill($id){
//		$user   = User::findOrFail(Auth::id());
		$user   = User::findOrFail($id);
		return view('users.skill', compact('user');
	}
//	public function edit($id){
//	}
}
