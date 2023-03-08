@extends('layouts.admin')
@section('content')
<style>
    .student_only{
        display: none
    }
</style>
<div class="main-body bg-light">
    <div class="wrapper p-3">
        <div class="breadcrumb-links">
            <ul class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('admin.dashboard')}}"><i class="fas fa-home"></i></a>
                </li>
                <li class="breadcrumb-item active">Add-User</li>
            </ul>
        </div>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="card card-primary">
            <div class="card-title">Add User</div>
            <div class="card-content">
                <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                        @if (session('success'))
                        <div id="flash-message" class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category">Select a User Type:</label>
                                <select id="user_type" class="form-control" name="user_type" onchange="Restform()">
                                <option value="student">Student</option>
                                <option value="teacher">Teacher</option>
                                {{-- <option value="college">College</option> --}}
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" required placeholder="Enter Email Here">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" name="first_name" required placeholder="Enter First Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" name="last_name"required placeholder="Enter Last Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" class="form-control" name="phone"required placeholder="Enter Phone Number">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" name="address" placeholder="Enter Address">
                            </div>
                        </div>
                        <div class="col-md-6 student" >
                            <div class="form-group">
                                <label>Roll Number</label>
                                <input type="text" class="form-control" name="roll_num" placeholder="Enter Roll Number">
                            </div>
                        </div>
                        <div class="col-md-6 student" >
                            <div class="form-group">
                                <label>Degree Title</label>
                                <input type="text" class="form-control" name="degree"  placeholder="Enter Degree Title">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" required placeholder="Password Here">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Profile Picture</label>
                                <input type="file" class="form-control" name="profile_pic"  placeholder="Password Here">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Assign Courses to User:</label><br>
                                <div class="row">
                                    @php
                                        $courses=App\Models\Course::get()
                                    @endphp
                                    @foreach ($courses as $course)
                                    <div class="col-md-4">
                                    <input type="checkbox" class="course" name="courses[]" value="{{$course->id}}">
                                    <label for="course1">{{$course->course_code}}</label>
                                    </div>
                                    @endforeach
                        </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group" style="text-align: center">
                                <input class="btn btn-primary flat" type="submit" value="Register">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    </div>
</div>
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
<script>
    function Restform(){
        var selected =document.getElementById('user_type').value;
        if(selected != "student"){
            var myDiv = document.getElementsByClassName("student");
            console.log(myDiv);
            for (var i = 0; i < myDiv.length; i++) {
                myDiv[i].style.display = "none";
    }
            console.log(selected);
        }else{
            var myDiv = document.getElementsByClassName("student");
            console.log(myDiv);
            for (var i = 0; i < myDiv.length; i++) {
                myDiv[i].style.display = "block";
    }
            console.log(selected);
        }
    }
</script>
@endsection
