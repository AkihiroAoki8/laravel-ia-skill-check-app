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
}
