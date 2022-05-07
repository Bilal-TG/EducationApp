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
                                    <select class="form-select" multiple="multiple" data-placeholder="Select Multiple options">
                                        @foreach ($allClasses as $class)
                                        <option value="{{$class->id}}">{{$class->class_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-label" for="site-name">Subject Name</label>
                                <span class="form-note">Name of the Subject.</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <input type="text" name="subject_title" class="form-control" id="site-name" placeholder="Subject Name">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-label">Add Subject Image</label>
                                <span class="form-note">Add Icon for Subject.</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <label class="form-label">Select Image Icon</label>
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
                                <label class="form-label">Publish Status</label>
                                <span class="form-note">Enable or disable subject Preview.</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <ul class="custom-control-group g-3 align-center flex-wrap">
                                <li>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" checked name="reg-public" id="reg-enable">
                                        <label class="custom-control-label" for="reg-enable">Publish</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="reg-public" id="reg-disable">
                                        <label class="custom-control-label" for="reg-disable">Unpublish</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="reg-public" id="reg-request">
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