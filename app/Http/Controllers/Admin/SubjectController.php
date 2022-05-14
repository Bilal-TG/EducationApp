<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\subject;
use App\Models\Classes;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


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
        // validate incoming request
        $validator = Validator::make($request->all(), [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'class_id' => 'required|integer',
            'subject_title' => 'required|string|max:50',
            'status' => 'required|integer'
        ]);
        
        if ($validator->fails()) {
            Session()->flash('error', 'All fields are required!');
            session()->flash('flash_type', 'alert-danger');
            session()->flash('icon', 'ni-alert-fill-c');
            return redirect()->back()->withInput();
        }
$checkSubject = subject::whereClassId($request->class_id)->whereTitle($request->subject_title)->first();
        if($checkSubject){
            Session()->flash('success', 'Subject with that name already exists in this class! Please try another one.');
            session()->flash('flash_type', 'alert-danger');
            session()->flash('icon', 'ni-alert-fill-c');
            return redirect()->route('allSubjects');
        }
        $file = $request->file('file');
        if($file){
            $ext = $file->extension();
            $className = Classes::find($request->class_id)->class_name;
            $filename = $className . '_'. $request->subject_title. '.' . $ext;
            
            $path = $file->storeAs('public/subject_icon', str_replace(' ', '_', $filename));
                if ($path) {
                    $path = asset(Storage::url($path));
                }
            $data = $request->all();
            $data['icon'] = $path;
            $data['class_id'] = $request->class_id;
            $data['title'] = $request->subject_title;
            $save = Subject::create($data);
            if ($save) {
                Session()->flash('message', 'Subject created successfully!');
                session()->flash('flash_type', 'alert-success');
                session()->flash('icon', 'ni-check-fill-c');
                return redirect()->route('allSubjects');
            }
        }else{
            Session()->flash('error', 'Image is not uploaded');
            session()->flash('flash_type', 'alert-warning');
            session()->flash('icon', 'ni-alert-fill-c');
            return redirect()->back();
        }
    }

    public function deleteSubject(Request $request)
    {
        $check = subject::whereId($request->id)->first();
        if ($check) {
            $check->delete();
            session()->flash('message', 'Subject Deleted Successfully!');
            session()->flash('flash_type', 'alert-danger');
            session()->flash('icon', 'ni-cross-circle-fill');
            return back();
        } else {
            session()->flash('message', 'Something went wrong');
            session()->flash('flash_type', 'alert-warning');
            session()->flash('icon', 'ni-alert-fill-c');
            return back();
        }
    }

    public function editSubject(Request $req)
    {
        $subject = subject::whereId($req->id)->first();
        $allClasses = Classes::all();
        return view('edit-subject')->with(compact('subject'))->with(compact('allClasses'));
    }

    public function updateSubject(Request $request){
        $subject = subject::whereId($request->id)->first();
        $subject->title = $request->subject_title;
        $subject->class_id = $request->class_id;
        $file = $request->file('file');
        if ($file != null) {
            $ext = $file->extension();
            $className = Classes::find($request->class_id)->class_name;
            $filename = $className . '_' . $request->subject_title . '.' . $ext;

            $path = $file->storeAs('public/subject_icon', str_replace(' ', '_', $filename));
            if ($path) {
                $path = asset(Storage::url($path));
            }
        }else{
            $path = $request->old_img;
        }
        $subject->icon = $path;
        $save = $subject->save();
        if ($save) {
            session()->flash('message', 'Subject Updated Successfully');
            session()->flash('flash_type', 'alert-success');
            session()->flash('icon', 'ni-check-circle-fill');
            return redirect()->route('allSubjects');
        } else {
            session()->flash('message', 'Something went wrong');
            session()->flash('flash_type', 'alert-danger');
            session()->flash('icon', 'ni-alert-fill-c');
            return redirect()->route('allSubjects');
        }
    }
}