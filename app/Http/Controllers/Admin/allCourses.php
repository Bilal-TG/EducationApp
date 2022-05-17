<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\Classes;
use App\Models\subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class allCourses extends Controller
{
    public function index(){
        $allCourses = Course::all();
        return view('all-courses',compact('allCourses'));
    }
    
    public function add(){
        $allClasses = Classes::all();
        $allSubject = subject::all();
        return view('add-course')->with(compact('allClasses','allSubject'));
    }

    public function saveCourse(Request $request){
        $validator = Validator::make($request->all(), [
            'class_id' => 'required|integer',
            'subject_id' => 'required|integer',
            'course_title' => 'required|string|max:50',
            'course_desc' => 'required|string',
            'course_add_time' => 'required|string',
            'keywords' => 'required|string',
            'price' => 'required|integer',
            'd_price' => 'required|integer',
            'course_cover' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            Session()->flash('message', 'All fields are required!');
            session()->flash('flash_type', 'alert-danger');
            session()->flash('icon', 'ni-alert-fill-c');
            return redirect()->back()->withInput();
        }
        $featured = $request->featured_course == 'on' ? 1 : 0;
        $popular =  $request->popular_course == 'on' ? 1 : 0 ;
        $file = $request->file('course_cover');
        $video_file = $request->file('intro_video');
        if ($file && $video_file) {
            if($file){
                $ext = $file->extension();
                $filename = $request->course_title . '.' . $ext;
    
                $path = $file->storeAs('public/course_cover', str_replace(' ', '_', $filename));
                if ($path) {
                    $path = asset(Storage::url($path));
                }
            }
            if($video_file){
                $video_ext = $video_file->extension();
                $video_filename = $request->course_title . '.' . $video_ext;

                $video_path = $video_file->storeAs('public/course_intros', str_replace(' ', '_', $video_filename));
                if ($video_path) {
                    $video_path = asset(Storage::url($video_path));
                }
            }
            $data['title'] = $request->course_title;
            $data['description'] = $request->course_desc;
            $data['subject_id'] = $request->subject_id;
            $data['class_id'] = $request->class_id;
            $data['add_time'] = $request->course_add_time;
            $data['course_image'] = $path;
            $data['intro_video'] = $video_path;
            $data['keywords'] = $request->keywords;
            $data['price'] = $request->price;
            $data['sale_price'] = $request->d_price;
            $data['status'] = $request->status;
            $data['features'] = $featured;
            $data['popular'] = $popular;
            return $data;
            $save = Course::create($data);
            if ($save) {
                Session()->flash('message', 'Course created successfully!');
                session()->flash('flash_type', 'alert-success');
                session()->flash('icon', 'ni-check-fill-c');
                return redirect()->route('allCourses');
            }
        } else {
            Session()->flash('message', 'Image is not uploaded');
            session()->flash('flash_type', 'alert-warning');
            session()->flash('icon', 'ni-alert-fill-c');
            return redirect()->back();
        }

    }

    public function editCourse($id){
        $course = Course::find($id);
        $allClasses = Classes::all();
        $allSubject = subject::all();
        return view('edit-course',compact('course','allClasses','allSubject'));
    }

    public function updateCourse(Request $request){
        $featured = $request->featured_course == 'on' ? 1 : 0;
        $popular =  $request->popular_course == 'on' ? 1 : 0;

        $course = Course::whereId($request->id)->first();
        $course->title = $request->course_title;
        $course->description = $request->course_desc;
        
        $course->class_id = $request->class_id;
        $course->subject_id = $request->class_id;
        $course->add_time = $request->course_add_time;
        //$course->intro_video = $request->intro_video;
        $course->keywords = $request->intro_video;
        $course->price = $request->price;
        $course->sale_price = $request->d_price;
        $course->status = $request->status;
        $course->featured = 1;
        $course->popular = 1;
        $file = $request->file('course_cover');
        if ($file != null) {
            $ext = $file->extension();
            $className = Classes::find($request->class_id)->class_name;
            $filename = $className . '_' . $request->subject_title . '.' . $ext;

            $path = $file->storeAs('public/course_cover', str_replace(' ', '_', $filename));
            if ($path) {
                $path = asset(Storage::url($path));
            }
        }else{
            $path = $request->old_img;
        }
        $course->course_image = $path;
        $save = $course->save();
        if ($save) {
            session()->flash('message', 'Course Updated Successfully');
            session()->flash('flash_type', 'alert-success');
            session()->flash('icon', 'ni-check-circle-fill');
            return redirect()->route('allCourses');
        } else {
            session()->flash('message', 'Something went wrong');
            session()->flash('flash_type', 'alert-danger');
            session()->flash('icon', 'ni-alert-fill-c');
            return redirect()->route('allCourses');
        }
    }
    public function deleteCourse(Request $request)
    {
        $course = course::whereId($request->id)->first();
        if ($course) {
            $course->delete();
            session()->flash('message', 'Course Deleted Successfully!');
            session()->flash('flash_type', 'alert-danger');
            session()->flash('icon', 'ni-cross-circle-fill');
            return redirect()->route('allCourses');
        } else {
            session()->flash('message', 'Something went wrong');
            session()->flash('flash_type', 'alert-warning');
            session()->flash('icon', 'ni-alert-fill-c');
            return redirect()->route('allCourses');
        }
    }
}