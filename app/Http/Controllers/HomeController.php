<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
 	public function index(){
		$user = User::findOrFail(Auth::id());
		return view('home.index', compact('user'));
	}
}
