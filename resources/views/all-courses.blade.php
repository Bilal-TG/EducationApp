@extends('layout.main')
@section('title','Learitsmarter | Dashboard | All Courses List')
@section('style')
<style>
.nk-tb-col {
    padding: 1rem 0rem;
}

.nk-tb-col.tb-col-md {
    text-align: center;
}

.icon.ni.ni-star-fill {
    color: #ff9d1f;
}
</style>
@endsection
@section('content')
<div class="nk-content">

    <!-- nk-block -->
    <div class="nk-block nk-block-lg">
        @if(Session::has('message'))
        <div class="example-alert mb-3">
            <div class="alert {{ Session::get('flash_type') }} alert-icon">
                <em class="icon ni {{ Session::get('icon') }}"></em> {{ Session::get('message') }}
            </div>
        </div>
        @endif
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title">All Courses List</h4><a href="{{route('add-Courses')}}"
                    class="btn btn-success">Add New Course</a>
            </div>
        </div>
        <table class="datatable-init nowrap nk-tb-list is-separate" data-auto-responsive="false">
            <thead>
                <tr class="nk-tb-item nk-tb-head">
                    <th class="nk-tb-col tb-col-sm"><span>Id</span></th>
                    <th class="nk-tb-col tb-col-sm"><span>Title</span></th>
                    <th class="nk-tb-col tb-col-sm"><span>Description</span></th>
                    <th class="nk-tb-col"><span>Price</span></th>
                    <th class="nk-tb-col"><span>Sale Price</span></th>
                    <th class="nk-tb-col"><span>Add Time</span></th>
                    <th class="nk-tb-col tb-col-md"><span>Status</span></th>
                    <th class="nk-tb-col tb-col-md">Featured<em class="tb-asterisk icon ni ni-star-round"></em></th>
                    <th class="nk-tb-col tb-col-md">Popular<em class="tb-asterisk icon ni ni-star-round"></em></th>
                    <th class="nk-tb-col nk-tb-col-tools">
                        <ul class="nk-tb-actions gx-1 my-n1">
                            <li class="mr-n1">
                                <div class="dropdown">Action </div>
                            </li>
                        </ul>
                    </th>
                </tr>
                <!-- .nk-tb-item -->
            </thead>
            <tbody>
                @foreach ($allCourses as $course)
                <tr class="nk-tb-item">
                    <td class="nk-tb-col"><span class="tb-sub">{{$course->id}}</span></td>
                    <td class="nk-tb-col tb-col-sm"><span class="tb-product"><span class="title">
                                {{$course->title}}</span></span></td>
                    <td class="nk-tb-col"><span class="tb-sub"><span class="title">
                                {{Str::of($course->description)->limit(25);}}
                            </span></span></td>
                    <td class="nk-tb-col"><span class="tb-sub">{{$course->price}}</span></td>
                    <td class="nk-tb-col"><span class="tb-sub">{{$course->sale_price}}</span></td>
                    <td class="nk-tb-col"><span class="tb-sub">{{$course->add_time}}</span></td>
                    <td class="nk-tb-col tb-col-md">
                        <span class="tb-sub">
                            {{ $course->status == 0 ? 'Unpublished' : 'Published' }}
                        </span>
                    </td>
                    <td class="nk-tb-col tb-col-md">
                        <em class="icon ni {{ $course->featured == 0 ? 'ni-star' : 'ni-star-fill' }} "></em>
                    </td>
                    <td class="nk-tb-col tb-col-md">
                        <em class="icon ni {{ $course->popular == 0 ? 'ni-star' : 'ni-star-fill' }} "></em>
                    </td>
                    <td class="nk-tb-col tb-col-md">
                        <a href="{{route('edit-course', $course->id)}}" class="btn btn-primary m-1"><em
                                class="icon ni ni-eye"></em></a>
                    </td>
                </tr>
                <!-- .nk-tb-item -->
                @endforeach
            </tbody>
        </table>
        <!-- .nk-tb-list -->
    </div>
    <!-- nk-block -->
</div>
@endsection