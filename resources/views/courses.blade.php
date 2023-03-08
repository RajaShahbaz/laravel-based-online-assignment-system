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

    <!--Main Body Start-->
    <div class="main-body bg-light">
        <div class="wrapper p-3">
            <div class="breadcrumb-links">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route('admin.dashboard')}}"><i class="fas fa-home"></i></a>
                    </li>
                    <li class="breadcrumb-item active">Courses</li>
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
                        <div class="card-title">Courses</div>
                        <div class="card-content">
                            {{-- <p class="para mb-20">You can be use those table for your desired dynamic content. It will
                                be help you to show multiple data.</p> --}}
                            <table id="datatable1" class="display responsive nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Course Code</th>
                                        <th>Course Title</th>
                                        <th>Credit Hours</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @php
                                   $i=1;
                                   @endphp
                                    @foreach ($courses as $course )
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$course->course_code}}</td>
                                        <td>{{$course->course_title}}</td>
                                        <td>{{$course->credit_hours}}</td>
                                        <td>
                                            {{-- <a href="#" class="text-dark"><i class="fas fa-eye"></i></a> --}}
                                            {{-- <a href="#" class="text-secondary"><i class="far fa-edit"></i></a> --}}
                                            {{-- <a href="#" class="text-secondary"><i class="far fa-edit"></i></a> --}}
                                            <a href="{{route('delete_course',['id'=>$course->id])}}" class="text-danger"><i class="fas fa-trash-alt"></i></a>
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
