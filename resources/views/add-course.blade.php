@extends('layout.main')
@section('title','Learitsmarter | Dashboard | Add New Course')
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
                    <h5 class="card-title">Add New Course</h5>
                </div>
                <form action="#" class="gy-3">
                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-label" for="site-name">Select Class</label>
                                <span class="form-note">Select the class to which you want to add the Subject.</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <label class="form-label">Select Class</label>
                                <div class="form-control-wrap">
                                    <select class="form-select" multiple="multiple"
                                        data-placeholder="Select Multiple options">
                                        <option value="">'class->class_name'</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-label" for="site-name">Select Subject</label>
                                <span class="form-note">Select the Subject to which you want to add the Course.</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <label class="form-label">Select Subject</label>
                                <div class="form-control-wrap">
                                    <select class="form-select" multiple="multiple"
                                        data-placeholder="Select Multiple options">
                                        <option value="">'class->class_name'</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-label" for="site-name">Course Title</label>
                                <span class="form-note">Name of the Course or Short Brief.</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <input type="text" name="subject_title" class="form-control" id="site-name"
                                        placeholder="Course Title">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-label" for="site-name">Course Description</label>
                                <span class="form-note">Add the Description of the project</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="card card-bordered">
                                <!-- Create the editor container -->
                                <div class="quill-minimal">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-label" for="site-name">Course Added Time</label>
                                <span class="form-note">Add course date of the course</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-calendar-alt"></em>
                                </div>
                                <input type="text" class="form-control date-picker">
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-label">Add Course Cover Image</label>
                                <span class="form-note">Add cover image for the course.</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <label class="form-label">Upload Course Image</label>
                            <div class="upload-zone" data-accepted-files="image/*">
                                <div class="dz-message" data-dz-message>
                                    <span class="dz-message-text">Drag and drop file</span>
                                    <span class="dz-message-or">or</span>
                                    <button class="btn btn-primary">SELECT</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-label">Add Course Intro Vide</label>
                                <span class="form-note">Add intro video of the course.</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <label class="form-label">Upload Course Intro Video</label>
                            <div class="upload-zone" data-accepted-files="image/*">
                                <div class="dz-message" data-dz-message>
                                    <span class="dz-message-text">Drag and drop file</span>
                                    <span class="dz-message-or">or</span>
                                    <button class="btn btn-primary">SELECT</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-label" for="site-name">Course Keywords</label>
                                <span class="form-note">Add Keywords to course, Separate keyword with comma ","</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <input type="text" name="subject_title" class="form-control" id="site-name"
                                        placeholder="Add Course Keywords">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-label" for="site-name">Course Price</label>
                                <span class="form-note">Add Course Price</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-control-wrap">
                                <div class="input-group">
                                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                        <span class="input-group-text">pkr</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-label" for="site-name">Course Sale Price</label>
                                <span class="form-note">Add Course Sale Price</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-control-wrap">
                                <div class="input-group">
                                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                        <span class="input-group-text">pkr</span>
                                    </div>
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
                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-label">Featured Course</label>
                                <span class="form-note">Add Course to featured to show into home slider!</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" checked id="customSwitch2">
                                <label class="custom-control-label" for="customSwitch2">Featured Course</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-label">Popular Course</label>
                                <span class="form-note">Add Course to popular section to show into home.</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" checked id="popularSwitch2">
                                <label class="custom-control-label" for="popularSwitch2">Popular Course</label>
                            </div>
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
    </div> <!-- nk-block -->
</div>
@endsection

@section('link-js')
<script src="{{asset('js/libs/editors/quill.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/editors/quill.css')}}">
<script src="{{asset('js/editors.js')}}">
</script>
@endsection