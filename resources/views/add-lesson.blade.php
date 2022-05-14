@extends('layout.main')
@section('title','Learitsmarter | Dashboard | Add New Lesson')
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
                    <h5 class="card-title">Add New Lesson</h5>
                </div>
                @if(Session::has('error'))
                        <div class="example-alert mb-3">
                            <div class="alert {{ Session::get('flash_type') }} alert-icon">
                          <em class="icon ni {{ Session::get('icon') }}"></em> {{ Session::get('error') }}
                          </div>
                        </div>
                      @endif
                <form action="{{route('saveLesson')}}" class="gy-3" method="post" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-label" for="site-name">Select Chapter</label>
                                <span class="form-note">Select the chapter to which you want to add Lesson</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <label class="form-label" for="site-name">Select Chapter</label>
                                    <select class="form-select" name="chapter_id" data-placeholder="Select chapter">
                                        <option disabled selected>----Select chapter----</option>
                                        @foreach ($allChapters as $chapter) 
                                        <option name="chapter_id" value="{{$chapter->id}}">{{$chapter->chapter_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-label" for="site-name">Select Course</label>
                                <span class="form-note">Select the Course to which you want to add Lesson</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <label class="form-label" for="site-name">Select Course</label>
                                    <select class="form-select" name="course_id" data-placeholder="Select chapter">
                                        <option disabled selected>----Select Course----</option>
                                         @foreach ($allCourses as $course)
                                        <option name="course_id" value="{{$course->id}}">{{$course->title}}</option>
                                        @endforeach 
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-label" for="site-name">Lesson Title</label>
                                <span class="form-note">Name of the Lesson or Short Brief.</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <label class="form-label">Add Lesson title</label>
                                    <input type="text" name="lesson_title" class="form-control" id="site-name"
                                        placeholder="Course Title">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-label" for="site-name">Lesson Description</label>
                                <span class="form-note">Add the Description of the Lesson</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="card card-bordered">
                                <!-- Create the editor container -->
                                <textarea name="lesson_desc" class="form-control quill-minimal" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-label" for="site-name">Lesson Explanation</label>
                                <span class="form-note">Add the Explanation of the Lesson</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="card card-bordered">
                                <!-- Create the editor container -->
                                <textarea name="lesson_expl" class="form-control quill-minimal" id="exampleFormControlTextarea1" rows="3"></textarea>
                            
                            </div>
                        </div>
                    </div>
                    
                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-label">Add Lesson Thumbnail Image</label>
                                <span class="form-note">Add Thumbnail for Lesson.</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <label class="form-label">Upload Thumbnail</label>
                                <div class="form-control-wrap">
                                    <div class="custom-file">
                                        <input type="file" name="lesson_cover" class="custom-file-input"
                                            id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-label">Add Lesson Intro Video</label>
                                <span class="form-note">Add intro video of the Lesson.</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <label class="form-label">Intro Video</label>
                                <div class="form-control-wrap">
                                    <div class="custom-file">
                                        <input type="file" name="intro_video" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        
                    


                    <div class="row g-3">
                        <div class="col-lg-7 offset-lg-5">
                            <div class="form-group mt-2">
                                <button type="submit" class="btn btn-lg btn-primary">Add</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- card -->
    </div> <!-- nk-block -->
</div>
@endsection

@section('link-js')
<script src="{{asset('js/libs/editors/quill.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/editors/quill.css')}}">
<script src="{{asset('js/editors.js')}}">
</script>
@endsection