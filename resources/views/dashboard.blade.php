@extends('layouts.admin')
@section('content')
@php
    $new_students=App\Models\User::where('role','student')->latest()->take(5)->get();
    $new_teachers=App\Models\User::where('role','teacher')->latest()->take(5)->get();
    $admins=App\Models\User::where('role','admin')->count();
    $users=App\Models\User::where('role','!=','admin')->count();
    $courses=App\Models\Course::count();


    $count=1
@endphp
<div class="main-body bg-light">
    <div class="wrapper p-3">
        <div class="breadcrumb-links">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active">Dashboard</li>
            </ul>
        </div>
        <div class="icon-boxes">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <!--Icon Box Start-->
                    <div class="icon-box bg-white">
                        <div class="icon">
                            <i class="fas fa-tachometer-alt"></i>
                            <span class="float-right">Admins</span>
                        </div>
                        <div class="icon-title">
                            <h4>Admins</h4>
                            <h4 class="float-right">{{$admins}}</h4>
                        </div>
                    </div>
                    <!--Icon Box End-->
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <!--Icon Box Start-->
                    <div class="icon-box bg-white">
                        <div class="icon">
                            <i class="fas fa-tachometer-alt"></i>
                            <span class="float-right">Users</span>
                        </div>
                        <div class="icon-title">
                            <h4>Users</h4>
                            <h4 class="float-right">{{$users}}</h4>
                        </div>
                    </div>
                    <!--Icon Box End-->
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <!--Icon Box Start-->
                    <div class="icon-box bg-white">
                        <div class="icon">
                            <i class="fas fa-tachometer-alt"></i>
                            <span class="float-right">Courses</span>
                        </div>
                        <div class="icon-title">
                            <h4>Total Courses</h4>
                            <h4 class="float-right">{{$courses}}</h4>
                        </div>
                    </div>
                    <!--Icon Box End-->
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <!--Icon Box Start-->
                    <div class="icon-box bg-white">
                        <div class="icon">
                            <i class="fas fa-tachometer-alt"></i>
                            <span class="float-right">Assignments</span>
                        </div>
                        <div class="icon-title">
                            <h4>Assignments</h4>
                            <h4 class="float-right">$20,000</h4>
                        </div>
                    </div>
                    <!--Icon Box End-->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card card-primary">
                    <div class="card-title">New Teachers</div>
                    <div class="card-content">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Image</th>
                                    <th> Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($new_teachers as $new_teacher )
                                @php
                                $url=Storage::url('images/'.$new_teacher->image)
                                @endphp
                                <tr>
                                    <th>{{$count}}</th>
                                    <td><img class="width-40 round-img" src="{{$url}}" alt="Image"></td>
                                    <td>{{$new_teacher->fname . $new_teacher->lname }}</td>
                                    <td>{{$new_teacher->email}}</td>
                                    <td><span class="badge badge-success">{{$new_teacher->status==1 ? "Active" : "Not-Active"}}</span></td>
                                </tr>
                                @php
                                    $count++;
                                @endphp
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card card-primary">
                    <div class="card-title">New Students</div>
                    <div class="card-content">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Image</th>
                                    <th> Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $count=1;
                                @endphp
                                @foreach ($new_students as $new_student )
                                @php
                                $url=Storage::url('images/'.$new_student->image)
                                @endphp
                                <tr>
                                    <th>{{$count}}</th>
                                    <td><img class="width-40 round-img" src="{{$url}}" alt="Image"></td>
                                    <td>{{$new_student->fname . $new_student->lname }}</td>
                                    <td>{{$new_student->email}}</td>
                                    <td><span class="badge badge-success">{{$new_student->status==1 ? "Active" : "Not-Active"}}</span></td>
                                </tr>
                                @php
                                    $count++;
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
@endsection
