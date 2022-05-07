<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classes;

class allClasses extends Controller
{
    public function index(){
        $allClasses = Classes::select('id','class_name', 'created_at', 'updated_at')->orderBy('id', 'asc')->get();
        return view('all-classes',compact('allClasses'));
    }

    public function saveClass(Request $request){
        $check = Classes::whereClassName($request->className)->first();
        if($check){
            session()->flash('message', 'Class is already added.');
            session()->flash('flash_type', 'alert-warning');
            session()->flash('icon', 'ni-alert-fill-c');
            return back();
        }else{
            $class = new Classes;
            $class->class_name = $request->className;
            $save = $class->save();
            if($save){
                session()->flash('message', 'New Class Added Successfully');
                session()->flash('flash_type', 'alert-success');
                session()->flash('icon', 'ni-check-circle-fill');
                return back();
            }else{
                session()->flash('message', 'Something went wrong');
                session()->flash('flash_type', 'alert-danger');
                session()->flash('icon', 'ni-alert-fill-c');
                return back();
            }
        }
    }

    public function deleteClass(Request $request){
        $check = Classes::whereId($request->id)->first();
        if ($check) {
            $check->delete();
            session()->flash('message', 'Class Delete Successfully!');
            session()->flash('flash_type', 'alert-danger');
            session()->flash('icon', 'ni-check-circle-fill');
            return back();
        } 
        else {
                session()->flash('message', 'Something went wrong');
                session()->flash('flash_type', 'alert-warning');
                session()->flash('icon', 'ni-alert-fill-c');
                return back();
            }
    }

    public function editClass(Request $req){
        $class = Classes::whereId($req->id)->first();
        return view('edit-class')->with(compact('class'));
    }

    public function updateClass(Request $request)
    {
        $class = Classes::whereId($request->id)->first();
        $class->class_name = $request->className;
        $save = $class->save();
        if ($save) {
            session()->flash('message', 'New Class Added Successfully');
            session()->flash('flash_type', 'alert-success');
            session()->flash('icon', 'ni-check-circle-fill');
            return redirect()->route('allClasses');
        } else {
            session()->flash('message', 'Something went wrong');
            session()->flash('flash_type', 'alert-danger');
            session()->flash('icon', 'ni-alert-fill-c');
            return redirect()->route('allClasses');
        }
    }

}