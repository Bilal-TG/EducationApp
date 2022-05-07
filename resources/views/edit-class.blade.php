@extends('layout.main')
@section('title','Learitsmarter | Dashboard | All Classes List')
@section('content')
<div class="nk-content">
    <!-- nk-block -->

    <!-- PopUp Start-->
    <div class="card">
        <div class="card-inner">
            <div class="card-head">
                <h5 class="card-title">Update Class</h5>
                <h5 class="close-btn"><em class="icon ni ni-cross-fill-c"></em></h5>
            </div>
            <form action="{{route('updateClass')}}" method="post">
                @csrf
                <div class="row g-4">
                    <div class="col-lg-6">
                        <input type="hidden" name="id" name="id" value="{{$class->id}}" class="form-control" id="">
                        <div class="form-group">
                            <label class="form-label" for="full-name-1">Class Name</label>
                            <div class="form-control-wrap">
                                <input type="text" name="className" value="{{$class->class_name}}" class="form-control"
                                    id="full-name-1">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Update Class</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- popup end -->

    <!-- nk-block -->
</div>
@endsection