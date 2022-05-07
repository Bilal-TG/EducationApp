@extends('layout.main')
@section('title','Learitsmarter | Dashboard | All Chapters List')
@section('content')
<div class="nk-content">
    <!-- nk-block -->
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title">All Chapters List</h4>
                <a href="#" class="btn btn-success add-class-btn">Add New Chapter</a>
            </div>
        </div>
        <div class="nk-block nk-block-lg">
            @foreach ($courses as $course)
            <div class="card card-preview">
                <div class="card-inner">

                    <div id="accordion" class="accordion">
                        <div class="accordion-item">
                            <a href="#" class="accordion-head" data-toggle="collapse"
                                data-target="#accordion-item-{{$course->id}}">
                                <h6 class="title">{{$course->title}}</h6>
                                <span class="accordion-icon"></span>
                            </a>
                            <div class="accordion-body collapse show" id="accordion-item-{{$course->id}}"
                                data-parent="#accordion">
                                <div class="card-inner">
                                    <div class="row">
                                        @foreach ($course->chapters as $chapter )
                                        <div class="col-lg-4 mt-2">
                                            <div class="card">
                                                <div class="card-inner">
                                                    <h5 class="card-title">{{$chapter->chapter_name}}</h5>
                                                    <p class="card-text">{{$chapter->chapter_description}}</p>
                                                    <a href="#" class="btn btn-primary">View / Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div><!-- .card-preview -->
                        </div>
                    </div>
                </div>
            </div><!-- .card-preview -->
            @endforeach
        </div>
    </div>
    <!-- nk-block -->
</div>
@endsection