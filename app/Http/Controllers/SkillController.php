<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Skill;

class SkillController extends Controller
{
    public function index(){
        $skills=Skill::all();

        return view('skills.index',compact('skills'));
    }

    
    public function create(){
        return view('skills.create');
    }
    public function store(Request $request){
        Skill::create([
            'name'=>$request['name']
        ]);
        return redirect()->route('skills.index');
    }
    public function delete($id){
        $skill=Skill::findOrFail($id);
        $skill->delete();
        
        return redirect()->route('skills.index');
    }
    public function edit($id){
        $oldskill=Skill::findOrFail($id);
        return view('skills.edit',compact('oldskill'));
    }
    public function update($id,Request $request){
        $skill=Skill::findOrFail($id);
        $skill->name=$request['name'];
        $skill->save();

        session()->flash('flash_message', '更新完了');
        return redirect()->route('skills.index');
    }
}
