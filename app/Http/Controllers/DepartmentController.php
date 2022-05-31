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
    public function store(Request $request)
    {
        department::create([
            'id' => $request['id'],
            'name' => $request['name'],
            'is_displayed' => $request['is_displayed'], 
        ]);


        session()->flash(
            'flash_message',
            '登録完了'
        );

        return redirect()->route('departments.index');
    }

    // 詳細画面の表示
    public function show($id){

        $department = Department::find($id);

        return view('department.show',compact('department'));
    }


    // 編集画面の表示
    public function edit($id){

        $department = Department::find($id);
        $show = $department->is_displayed;
        return view('department.edit',compact('department','show'));
    }

    // 更新
    // public function upadate(Request $request, $id){

    //     $department= Department::find($id);
    //     $update = $this->department->updateDepartment($request,$id);

    //     return redirect()->route('department.index');
    // }

    public function update($id, Request $request)
    {
        $department = Department::findOrFail($id);
        // $department->id = $request['id'];
        $department->name = $request['name'];
        $department->is_displayed = $request['is_displayed'];
        $department->save();


        session()->flash('flash_message', '更新完了');
        return redirect()->route('departments.index');
    }

    // 削除
    public function delete(Request $request, $id){

        $department = Department::findOrFail($id)->delete();
        return redirect()->route('departments.index');
    }
}
