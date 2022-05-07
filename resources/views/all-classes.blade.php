@extends('layout.main')
@section('title','Learitsmarter | Dashboard | All Classes List')
@section('content')
<div class="nk-content">
    <!-- nk-block -->
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title">All Classes List</h4>
                <a href="#" class="btn btn-success add-class-btn">Add New Class</a>
            </div>
            @if(Session::has('message'))
            <div class="example-alert mt-3">
                <div class="alert {{ Session::get('flash_type') }} alert-icon">
                    <em class="icon ni {{ Session::get('icon') }}"></em> {{ Session::get('message') }}
                </div>
            </div>
            @endif
        </div>
        <table class="datatable-init nowrap nk-tb-list is-separate" data-auto-responsive="false">
            <thead>
                <tr class="nk-tb-item nk-tb-head">
                    <th class="nk-tb-col tb-col-sm"><span>Id</span></th>
                    <th class="nk-tb-col tb-col-sm"><span>Class Name</span></th>
                    <th class="nk-tb-col tb-col-sm"><span>Created At</span></th>
                    <th class="nk-tb-col nk-tb-col-tools">
                        <ul class="nk-tb-actions gx-1 my-n1">
                            <li class="mr-n1">
                                <div class="dropdown">
                                    Action
                                </div>
                            </li>
                        </ul>
                    </th>
                </tr><!-- .nk-tb-item -->
            </thead>
            <tbody>
                <div class="d-none">{{$s = 1}}</div>
                @foreach ($allClasses as $class )
                <tr class="nk-tb-item single-item">
                    <td class="nk-tb-col">
                        <span class="tb-sub">{{$s++}}</span>
                    </td>
                    <td class="nk-tb-col tb-col-sm">
                        <span class="tb-product">
                            <span class="title">{{$class->class_name}}</span>
                        </span>
                    </td>
                    <td class="nk-tb-col">
                        <span class="tb-sub">{{$class->created_at}}</span>
                    </td>
                    <td class="nk-tb-col nk-tb-col-tools">
                        <ul class="nk-tb-actions gx-1 my-n1">
                            <li class="mr-n1">
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                        data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <ul class="link-list-opt no-bdr">
                                            <li><a href="{{route('editClass', $class->id)}}"><em
                                                        class="icon ni ni-edit"></em><span>Edit
                                                        Class</span></a>
                                            </li>
                                            <li><a href="{{route('deleteClass', $class->id)}}"><em
                                                        class="icon ni ni-trash"></em><span>Remove
                                                        Class</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </td>
                </tr><!-- .nk-tb-item -->
                @endforeach

            </tbody>
        </table><!-- .nk-tb-list -->
    </div>

    <!-- PopUp Start-->
    <div class="card popUp-card">
        <div class="card-inner">
            <div class="card-head">
                <h5 class="card-title">Add New Class</h5>
                <h5 class="close-btn"><em class="icon ni ni-cross-fill-c"></em></h5>
            </div>
            <form action="{{route('saveClass')}}" method="post">
                @csrf
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label" for="full-name-1">Class Name</label>
                            <div class="form-control-wrap">
                                <input type="text" name="className" class="form-control" id="full-name-1">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Add New</button>
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