<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class allCourses extends Controller
{
    public function index(){
        $allCourses = Course::all();
        return view('all-courses',compact('allCourses'));
    }
    
    public function add(){
        return view('add-course');
    }
}
