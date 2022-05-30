<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
	public function skill($id){
		$user   = User::findOrFail($id);
		return view('users.skill', compact('user'));
	}
	public function edit($id){
		$user	= User::findOrFail($id);
		return view('users.edit', compact('user'));
	}
}
