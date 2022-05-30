<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Department;

use App\Models\User;

class DepartmentController extends Controller
{
    // 一覧画面
    public function index(){

        $departments=Department::all();

        return view('department.index',compact('departments'));
    }

    // 登録画面
    public function create(Request $request){

        return view('department.create');
    }

    // 登録処理
    public function store(Request $request){

        $registerUser = $this->name->InsertUser($request);

        return redirect()->route('department.index');
    }

    // 詳細画面の表示
    public function show($id){

        $department = Department::find($id);

        return view('department.show',compact('department'));
    }


    // 編集画面の表示
    public function edit($id){

        $department = Department::find($id);

        return view('department.show',compact('department'));
    }

    // 更新
    public function upadate(Request $request, $id){

        $department= Department::find($id);
        $update = $this->department->updateDepartment($request,$id);

        return redirect()->route('department.index');
    }

    // 削除
    public function delete(Request $request, $id){

        $department = Department::find($id);
        $delete = $this->department->deleteDepartment($request,$id);

        return redirect()->route('department.index');
    }
}
