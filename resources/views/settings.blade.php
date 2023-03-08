@extends('layouts.admin')
@section('content')

<div class="main-body bg-light">
    <div class="wrapper p-3">
        <div class="breadcrumb-links">
            <ul class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('admin.dashboard')}}"><i class="fas fa-home"></i></a>
                </li>
                <li class="breadcrumb-item active">Settings</li>
            </ul>
        </div>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="card card-primary">
            <div class="card-title">Profile Settings</div>
            <div class="card-content">
                <form action="{{route('user.store')}}" method="post">
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
                                <select id="user_type" class="form-control"  name="user_type"  disabled>
                                <option value="student" >Choose a user type</option>
                                <option value="student" {{ $user->role == 'student' ? 'selected' : '' }}>Student</option>
                                <option value="teacher" {{ $user->role == 'teacher' ? 'selected' : '' }}>Teacher</option>
                                {{-- <option value="college">College</option> --}}
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="{{$user->email}}" required placeholder="Enter Email Here" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" name="first_name" value="{{$user->fname}}" required placeholder="Enter First Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" name="last_name" value="{{$user->lname}}" required placeholder="Enter Last Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" class="form-control" name="phone"required value="{{$user->phone}}" placeholder="Enter Phone Number" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" name="address" value="{{$user->address}}" placeholder="Enter Address">
                            </div>
                        </div>
                        <div class="col-md-6 student" >
                            <div class="form-group">
                                <label>Roll Number</label>
                                <input type="text" class="form-control" name="roll_num" value="{{$user->roll_num}}" placeholder="Enter Roll Number" readonly>
                            </div>
                        </div>
                        <div class="col-md-6 student" >
                            <div class="form-group">
                                <label>Degree Title</label>
                                <input type="text" class="form-control" name="degree" value="{{$user->degree}}" placeholder="Enter Degree Title" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Profile Picture</label>
                                <input type="file" class="form-control" name="profile_pic"  placeholder="Password Here">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Profile Picture</label><br>
                                @php
                                $url=Storage::url('images/'.$user->image)
                                @endphp
                               <img src="{{$url}}" alt="" width="100px">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>My Courses:</label><br>
                                <div class="row">
                                    @php
                                        $courses=App\Models\Course::get()
                                    @endphp
                                    @foreach ($user->courses as $course)
                                    <div class="col-md-4">
                                    <input type="checkbox" class="course" name="courses[]" checked disabled value="{{$course->id}}">
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
