@extends('layouts.admin')
@section('content')


    <!--Stylesheets-->
    <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/plugins/datatable/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/plugins/datatable/bootstrap-table.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
<style>
    div.dataTables_wrapper div.dataTables_filter input{
        width: 100% !important
    }
</style>

    <!--Header End-->
{{-- @php
    $users=App\Models\User::where('role','admin')->latest()->get();
@endphp --}}
    <!--Main Body Start-->
    <div class="main-body bg-light">
        <div class="wrapper p-3">
            <div class="breadcrumb-links">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route('admin.dashboard')}}"><i class="fas fa-home"></i></a>
                    </li>
                    <li class="breadcrumb-item active">Assignments</li>
                </ul>
            </div>
            {{-- <a href="{{route('add_admin')}}" class="btn btn-primary">Add Admin</a> --}}
            <div class="row">

                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    @if (session('success'))
                    <div id="flash-message" class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('fail'))
                    <div id="flash-message" class="alert alert-danger">
                        {{ session('fail') }}
                    </div>
                @endif
                    <div class="card card-primary">
                        <div class="card-title">Assignments</div>
                        <div class="card-content">
                            {{-- <p class="para mb-20">You can be use those table for your desired dynamic content. It will
                                be help you to show multiple data.</p> --}}
                            <table id="datatable1" class="display responsive nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Course</th>
                                        <th>Title</th>
                                        <th>Deadline</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @php
                                   $i=1;
                                    $logged_in=auth()->user();
                                   @endphp
                                    @foreach ($assignments as $assignment )
                                    @php

                                    $status=App\Models\AssignmentStudent::where('student_id',$logged_in->id)
                                    ->where('assignment_id',$assignment->id)
                                    ->first();
                                @endphp
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$assignment->course->course_code}}</td>
                                        <td>{{$assignment->assignment_title}}</td>
                                        <td><span class="badge badge-success">{{$assignment->deadline}}</span></td>
                                        @if($logged_in->role=='student')
                                            <td><span class="badge badge-success">{{$status ? $status->status : "Pending"}}</span></td>
                                        @else
                                        <td><span class="badge badge-success">{{$assignment->status ==1 ? "Pending" : "Completed"}}</span></td>
                                        @endif
                                        <td>
                                            {{-- <a href="#" class="text-dark"><i class="fas fa-eye"></i></a> --}}
                                            @if($logged_in->role=='student')
                                            <a href="{{ route('download-assignment', ['id' =>$assignment->id]) }}" class="text-secondary"><i class="fa fa-download"></i></a>
                                           @if (empty($status))
                                           <a href="{{route('upload_assignment_form',['id'=>$assignment->id])}}" class="text-secondary"><i class="fa fa-upload"></i></a>
                                           @endif
                                            @else
                                            <a href="{{route('delete_assignment',['id'=>$assignment->id])}}" class="text-danger"><i class="fas fa-trash-alt"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                    @php
                                        $i++
                                    @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--Main Body End-->

    <!--Javascripts-->

    <script src="{{asset('admin/js/jquery.min.js')}}"></script>
    <script src="{{asset('admin/js/plugins/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('admin/js/plugins/datatable/initiate.js')}}"></script>
    <script>
        $(document).ready(function() {
            // Hide the flash message after 10 seconds
            setTimeout(function() {
                $('#flash-message').fadeOut('slow');
            }, 5000);
        });
    </script>
@endsection
