<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserManagementController extends Controller
{
    public function index(){
        $users = User::where("department_id", Auth::user()->department_id )->get();
        return view("users/index", compact("users"));
    }

    public function show($id){
        $user = User::findOrFail($id);
        return view("users/show", compact("user"));
    }

    public function edit($id){
        $user = User::findOrFail($id);
        $departments = ["営業部", "システム部", "マーケティング部", "デザイン部", "組織運営部", "新規事業開発部", "システム管理部", "飛び込み営業部", "経理部", "窓際社員部"];
        return view("users/edit", compact("user", "departments"));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            "name" => "required",
            "email" => "required",
            "role" => "required",
            "department" => "required"
        ]);

        $user = User::findOrFail($id);

        $user->name = $request["name"];
        $user->email = $request["email"];
        $user->role = $request["role"];
        $user->department_id = $request["department"];
        $user->save();

        return redirect()->route('user-manage.index');
    }

    public function delete($id){
        $text = User::findOrFail($id)->delete();
        
        return redirect()->route('user-manage.index');
    }
}
