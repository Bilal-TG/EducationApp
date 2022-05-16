@extends('layout.main')
@section('title','Learitsmarter | Dashboard | All Chapters List')
@section('style')
<style>
a:after {
    visibility: hidden;
    opacity: 0;
    transition: visibility 0s linear 0.5s, opacity 0.5s linear, font 0.05s linear;
    font-size: 0;
}

a:hover:after {
    content: '   'attr(title);
    visibility: visible;
    opacity: 1;
    transition-delay: 0s;
    font-size: 13px;
}
</style>
@endsection
@section('content') <div class="nk-content">
    <!-- nk-block -->
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head">
            @if(Session::has('success'))
            <div class="example-alert mb-3">
                <div class="alert {{ Session::get('flash_type') }} alert-icon">
                    <em class="icon ni {{ Session::get('icon') }}"></em> {{ Session::get('success') }}
                </div>
            </div>
            @endif
            <div class="nk-block-head-content">
                <h4 class="nk-block-title">All FAQs List</h4><a href="{{ route('add-faq') }}" class="btn btn-success add-class-btn">Add
                    New FAQ</a>  
            </div>
        </div>
        <div class="nk-block nk-block-lg">
            @foreach ($allFaqs as $faq)
            <div class="card card-preview mb-2">
                <div class="card-inner">
                    <div id="accordion" class="accordion">
                        <div class="accordion-item"><a href="#" class="accordion-head" data-toggle="collapse"
                                data-target="#accordion-item-{{$faq->id}}">
                                <h6 class="title"> {{$faq->question}}

                                </h6><span class="accordion-icon"></span>
                            </a>
                            <div class="accordion-body collapse show" id="accordion-item-{{$faq->id}}"
                                data-parent="#accordion">
                                <div class="card-inner">
                                    <div class="row">
                                        <div class="col-12 mt-1">
                                            <div class="card">
                                                <div class="card-inner">
                                                   
                                                    <p class="card-text"> {{$faq->answer}}

                                                    </p><a href="{{route('edit-faq', $faq->id)}}" class="btn btn-primary">Edit</a>
                                                    <a href="{{route('delete-faq', $faq->id)}}" class="btn btn-danger">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .card-preview -->
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- .card-preview -->
    
</div>
<!-- nk-block -->
</div>@endsection