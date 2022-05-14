@extends('layout.main')
@section('title','Learitsmarter | Dashboard | All Subject List')
@section('content')
<div class="nk-content">
    <!-- nk-block -->
    <div class="nk-block nk-block-lg">
        <div class="nk-block-head">
            @if(Session::has('message'))
            <div class="example-alert mb-3">
                <div class="alert {{ Session::get('flash_type') }} alert-icon">
                    <em class="icon ni {{ Session::get('icon') }}"></em> {{ Session::get('message') }}
                </div>
            </div>
            @endif
            <div class="nk-block-head-content">
                <h4 class="nk-block-title">All Subject List</h4>
                <a href="{{route('add-subject')}}" class="btn btn-success">Add New Subject</a>
            </div>
        </div>
        <table class="datatable-init nowrap nk-tb-list is-separate" data-auto-responsive="false">
            <thead>
                <tr class="nk-tb-item nk-tb-head">
                    <th class="nk-tb-col tb-col-sm"><span>Id</span></th>
                    <th class="nk-tb-col tb-col-sm"><span>Class Id</span></th>
                    <th class="nk-tb-col tb-col-sm"><span>Subject Name</span></th>
                    <th class="nk-tb-col tb-col-sm"><span>Subject Icon</span></th>
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
                @foreach ($allSubjects as $subject )
                <tr class="nk-tb-item">
                    <td class="nk-tb-col">
                        <span class="tb-sub">{{$subject->id}}</span>
                    </td>
                    <td class="nk-tb-col tb-col-sm">
                        <span class="tb-product">
                            <span class="title">{{$subject->class_id}}</span>
                        </span>
                    </td>
                    <td class="nk-tb-col tb-col-sm">
                        <span class="tb-product">
                            <span class="title">{{$subject->title}}</span>
                        </span>
                    </td>
                    <td class="nk-tb-col tb-col-sm">
                        <span class="tb-product">
                            <image src="{{$subject->icon}}" height="60" width="60" alt="image">
                        </span>
                    </td>
                    <td class="nk-tb-col">
                        <span class="tb-sub">{{$subject->created_at}}</span>
                    </td>
                    <td class="nk-tb-col nk-tb-col-tools">
                        <ul class="nk-tb-actions gx-1 my-n1">
                            <li class="mr-n1">
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                        data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <ul class="link-list-opt no-bdr">
                                            <li><a href="{{route('edit-subject', $subject->id)}}"><em
                                                        class="icon ni ni-edit"></em><span>Edit
                                                        Subject</span></a>
                                            </li>
                                            <li><a href="{{route('delete-subject', $subject->id)}}"><em
                                                        class="icon ni ni-trash"></em><span>Remove
                                                        Subject</span></a></li>
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
    <!-- nk-block -->
</div>
@endsection