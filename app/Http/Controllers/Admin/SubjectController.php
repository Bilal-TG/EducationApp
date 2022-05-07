<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\subject;
use App\Models\Classes;

class SubjectController extends Controller
{
    public function index()
    {
        $allSubjects = Subject::all();

        foreach ($allSubjects as $subject) {
            $class = Classes::find($subject->class_id);
            $subject->class_id = $class->class_name;
        }

        return view('all-subjects', compact('allSubjects'));
    }
    
    public function add()
    {
        $allClasses = Classes::all();
        return view('addSubject', compact('allClasses'));
    }

    public function save(Request $request){
        return $request;
    }
}