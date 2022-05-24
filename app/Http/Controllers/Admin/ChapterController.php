<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Course;
use App\Models\Classes;

class ChapterController extends Controller
{
    public function index()
    {
        $courses = Course::with('chapters')->get();
        return view('all-chapters', compact('courses'));
    }

    public function add()
    {
        $allCourses = Course::all();
        return view('add-chapter', compact('allCourses'));
    }
}