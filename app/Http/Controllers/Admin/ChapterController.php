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

    public function save(Request $request){
        $request->validate([
            'chapter_name' => 'required',
            'course_id' => 'required',
            'chapter_desc' => 'required',
        ]);
        $chapter = new Chapter();
        $chapter->chapter_name = $request->chapter_name;
        $chapter->course_id = $request->course_id;
        $chapter->chapter_description = $request->chapter_desc;
        $save = $chapter->save();
        if ($save) {
                Session()->flash('message', 'Chapter Added successfully!');
                session()->flash('flash_type', 'alert-success');
                session()->flash('icon', 'ni-check-fill-c');
                return redirect()->route('all-chapters');
        } else {
            Session()->flash('message', 'Error Occured!');
            session()->flash('flash_type', 'alert-warning');
            session()->flash('icon', 'ni-alert-fill-c');
            return redirect()->back();
        }
    }

    public function edit($id){
        $chapter = Chapter::find($id);
        $allCourses = Course::all();
        return view('edit-chapter', compact('chapter','allCourses'));
    }

    public function updateChapter(Request $request){
        return $request->all();
        $request->validate([
            'chapter_name' => 'required',
            'course_id' => 'required',
            'chapter_desc' => 'required',
        ]);
        $chapter = Chapter::find($request->chapter_id);
        $chapter->chapter_name = $request->chapter_name;
        $chapter->course_id = $request->course_id;
        $chapter->chapter_description = $request->chapter_desc;
        $save = $chapter->save();
        if ($save) {
                Session()->flash('message', 'Chapter Updated successfully!');
                session()->flash('flash_type', 'alert-success');
                session()->flash('icon', 'ni-check-fill-c');
                return redirect()->route('all-chapters');
        } else {
            Session()->flash('message', 'Error Occured!');
            session()->flash('flash_type', 'alert-warning');
            session()->flash('icon', 'ni-alert-fill-c');
            return redirect()->back();
        }
    }
}