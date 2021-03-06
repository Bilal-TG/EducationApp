@extends('layout.main')
@section('title','Learitsmarter | Dashboard | Add New Subject')
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
                    <h5 class="card-title">Add New Subject</h5>
                </div>
                @if(Session::has('error'))
                <div class="example-alert mt-3">
                    <div class="alert {{ Session::get('flash_type') }} alert-icon">
                        <em class="icon ni {{ Session::get('icon') }}"></em> {{ Session::get('error') }}
                    </div>
                </div>
                @endif
                <form action="{{route('save-subject')}}" class="gy-3" method="post" enctype="multipart/form-data"
                    class="dropzone" id="dropzone">
                    @csrf
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
                                    <select class="form-select" name="class_id" data-placeholder="Select Class">
                                        @foreach ($allClasses as $class)
                                        <option name="class_id" value="{{$class->id}}">{{$class->class_name}}</option>
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
                                    <input type="text" name="subject_title" class="form-control" id="site-name"
                                        placeholder="Subject Name">
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
                        <input hidden id="file" name="file" />
                        <div class="col-lg-7">
                            <div class="form-group">
                                <label class="form-label">Upload Subject Icon</label>
                                <div class="form-control-wrap">
                                    <div class="custom-file">
                                        <input type="file" name="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
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
                                        <input type="radio" value="1" class="custom-control-input" checked name="status"
                                            id="reg-enable">
                                        <label class="custom-control-label" for="reg-enable">Publish</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" value="0" class="custom-control-input" name="status"
                                            id="reg-disable">
                                        <label class="custom-control-label" for="reg-disable">Unpublish</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" value="2" class="custom-control-input" name="status"
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
                                <button type="submit" class="btn btn-lg btn-primary">Submit</button>
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