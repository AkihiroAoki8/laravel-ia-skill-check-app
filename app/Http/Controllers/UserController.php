<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
	public function request(Request $request, $id){
		$validated = $request->validate([
			'*' => 'required|integer|min:1|max:10'
		]);

		$user = User::findOrFail($id);
		foreach($user->skills as $skill){
			$skill->pivot->pending_point = $request[$skill->name];
			$skill->pivot->request_at    = Carbon::now();
		}
		
		$user->save();
        session()->flash('flash_message', '申請しました');
        return redirect()->route('users.skill');
	}
}
