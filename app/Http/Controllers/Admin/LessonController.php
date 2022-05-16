<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Chapter;
use App\Models\Course;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class LessonController extends Controller
{
    public function index()
    {
        $allLessons = Lesson::all();
        return view('all-lesson', compact('allLessons'));
    }
    public function add(){
        $allChapters = chapter::all();
        $allCourses =course ::all();
        $allLessons =lesson::all();
        return view('add-lesson', compact('allChapters', 'allCourses'));
    }
    public function save(Request $request)
    {
        
         $validator = Validator::make($request->all(), [
             'chapter_id' => 'required|integer',
             'course_id' => 'required|integer',
            'leasson_title' => 'required|string|max:50',
             'lesson_desc' => 'required|string',
             'lesson_expl' => 'required|string',
             'lesson_cover' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
             'intro_video'  => 'required | mimes:mp4,mov,ogg | max:20000'
         ]);

         if ($validator->fails()) {
         Session()->flash('error', 'All fields are required!');
             session()->flash('flash_type', 'alert-danger');
             session()->flash('icon', 'ni-alert-fill-c');
             return redirect()->back()->withInput();
         }
        $file = $request->file('lesson_cover');
        $video_file = $request->file('intro_video');
        if ($file && $video_file) {
            if($file){
                $ext = $file->extension();
                $filename = $request->course_title . '.' . $ext;
    
                $path = $file->storeAs('public/lesson_cover', str_replace(' ', '_', $filename));
                if ($path) {
                    $path = asset(Storage::url($path));
                }
            }
            if($video_file){
                $video_ext = $video_file->extension();
                $video_filename = $request->course_title . '.' . $video_ext;

                $video_path = $video_file->storeAs('public/lesson_intro', str_replace(' ', '_', $video_filename));
                if ($video_path) {
                    $video_path = asset(Storage::url($path));
                }
            }
            
            $data['title'] = $request->course_title;
            $data['description'] = $request->course_desc;
            $data['long_text'] = $request->course_desc;
            $data['chapter_id'] = $request->subject_id;
            $data['course_id'] = $request->class_id;
            $data['thumbnail_link'] = $path;
            $data['vide0_link'] = $video_path;
            $data['position'] = $request->lesson_position;
            
            $save = Course::create($data);
            if ($save) {
                $lessonsCount = Lesson::whereCourseId($request->course_id)->count();
                $courseUpdate = Course::find($request->course_id);
                $courseUpdate->total_lessons = $lessonsCount;
                $courseUpdate->save();
                Session()->flash('message', 'Lesson Added successfully!');
                session()->flash('flash_type', 'alert-success');
                session()->flash('icon', 'ni-check-fill-c');
                return redirect()->back();
            }
        } else {
            Session()->flash('error', 'Image is not uploaded');
            session()->flash('flash_type', 'alert-warning');
            session()->flash('icon', 'ni-alert-fill-c');
            return redirect()->back();
        }
    }
}