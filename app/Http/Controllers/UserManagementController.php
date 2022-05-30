<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserManagementController extends Controller
{
    public function index(){
        $users = User::where("department_id", Auth::user()->department_id )->get();
        return view("user-manage/index", compact("users"));
    }

    public function show($id){
        $user = User::findOrFail($id);
        return view("user-manage/show", compact("user"));
    }

    public function create(){
        $departments = ["営業部", "システム部", "マーケティング部", "デザイン部", "組織運営部", "新規事業開発部", "システム管理部", "飛び込み営業部", "経理部", "窓際社員部"];
        return view("user-manage/create", compact("departments"));
    }

    public function store(Request $request){
        $validated = $request->validate([
            "name" => "required",
            "email" => "required",
            "role" => "required",
            "department" => "required"
        ]);

        User::create([
            "name" => $request["name"],
            "email" => $request["email"],
            'email_verified_at' => now(),
            "password" => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            "role" => $request["role"],
            "department" => $request["department_id"]
        ]);

        return redirect()->route('users.index');
    }

    public function edit($id){
        $user = User::findOrFail($id);
        $departments = ["営業部", "システム部", "マーケティング部", "デザイン部", "組織運営部", "新規事業開発部", "システム管理部", "飛び込み営業部", "経理部", "窓際社員部"];
        return view("user-manage/edit", compact("user", "departments"));
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
