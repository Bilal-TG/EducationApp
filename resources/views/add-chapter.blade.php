@extends('layout.main')
@section('title','Learitsmarter | Dashboard | Add New Chapter')
@section('style')
<style>
#site-name::placeholder {
    font-weight: 400;
    color: #455364;
}
</style>
@endsection
@section('content')
<div class="nk-content">
    <!-- nk-block -->
    <div class="nk-block nk-block-lg">
        <div class="card">
            <div class="card-inner">
                <div class="card-head">
                    <h5 class="card-title">Add New Chapter</h5>
                </div>
                <form action="{{route('save-chapter')}}" method="post" class="gy-3">
                    @csrf
                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-label" for="site-name">Select Course</label>
                                <span class="form-note">Select the Course to which you want to add the Chapter.</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <label class="form-label">Select Course</label>
                                <div class="form-control-wrap">
                                    <select class="form-select" name="course_id" data-placeholder="Select Course">
                                        @foreach ($allCourses as $course)
                                        @if($course->id == basename(Request::url()))
                                        <option selected name="course_id" value="{{$course->id}}">
                                            {{$course->title}} (Selected)
                                        </option>
                                        @endif
                                        <option name="course_id" value="{{$course->id}}">{{$course->title}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-label" for="site-name">Chapter Name</label>
                                <span class="form-note">Name of the Chapter.</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <input type="text" name="chapter_name" class="form-control" id="site-name"
                                        placeholder="Chapter Name">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-label" for="site-name">Chapter Description</label>
                                <span class="form-note">Add the Description of the Chapter</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="card card-bordered">
                                <!-- Create the editor container -->
                                <textarea id="editor" name="chapter_desc" class="quill-minimal">
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-label" for="site-name">Select Quiz</label>
                                <span class="form-note">Select the Quiz for this Chapter.</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <label class="form-label">Select Quiz</label>
                                <div class="form-control-wrap">
                                    <select class="form-select" multiple="multiple"
                                        data-placeholder="Select Quiz options">
                                        <option value="id">id-#</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-label">Publish Status</label>
                                <span class="form-note">Enable or disable subject Preview.</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <ul class="custom-control-group g-3 align-center flex-wrap">
                                <li>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" checked name="reg-public"
                                            id="reg-enable">
                                        <label class="custom-control-label" for="reg-enable">Publish</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="reg-public"
                                            id="reg-disable">
                                        <label class="custom-control-label" for="reg-disable">Unpublish</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="reg-public"
                                            id="reg-request">
                                        <label class="custom-control-label" for="reg-request">Draft</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-lg-7 offset-lg-5">
                            <div class="form-group mt-2">
                                <button type="submit" class="btn btn-lg btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- card -->
    </div>
    <!-- nk-block -->
</div>
@endsection

@section('link-js')
<script src="{{asset('js/libs/editors/quill.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/editors/quill.css')}}">
<script src="{{asset('js/editors.js')}}">
</script>
@endsection