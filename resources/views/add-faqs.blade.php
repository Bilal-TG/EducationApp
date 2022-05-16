@extends('layout.main')
@section('title','Learitsmarter | Dashboard | Add New FAQ')
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
        @if(Session::has('error'))
                        <div class="example-alert mb-3">
                            <div class="alert {{ Session::get('flash_type') }} alert-icon">
                          <em class="icon ni {{ Session::get('icon') }}"></em> {{ Session::get('error') }}
                          </div>
                        </div>
                      @endif
        <div class="card">
            <div class="card-inner">
                <div class="card-head">
                    <h5 class="card-title">Add New FAQ</h5>
                </div>
                
                <form action="{{ route('save-faq') }}" class="gy-3" method="post">
                    @csrf
               

                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-label" for="site-name">Add Question</label>
                                <span class="form-note">Enter question</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <label class="form-label">Add Question title</label>
                                    <input type="text" name="faq_question" class="form-control" id="site-name"
                                        placeholder="Question">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-label" for="site-name">Question Answer</label>
                                <span class="form-note">Add the Answer of the Question</span>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="card card-bordered">
                                <!-- Create the editor container -->
                                <textarea name="faq_answer" class="form-control quill-minimal" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </div>
                    </div>


                    <div class="row g-3">
                        <div class="col-lg-7 offset-lg-5">
                            <div class="form-group mt-2">
                                <button type="submit" class="btn btn-lg btn-primary">Add Question</button>
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