@extends('layouts.admin')
@section('content')
<div class="main-body bg-light">
    <div class="wrapper p-3">
        <div class="breadcrumb-links">
            <ul class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('admin.dashboard')}}"><i class="fas fa-home"></i></a>
                </li>
                <li class="breadcrumb-item active">Add-Admin</li>
            </ul>
        </div>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="card card-primary">
            <div class="card-title">Add Admin</div>
            <div class="card-content">
                <form action="{{route('store_admin')}}" method="post">
                    @csrf
                    <div class="row">
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
                                <label>Email Input</label>
                                <input type="email" class="form-control" name="email" required placeholder="Email Here">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Password Input</label>
                                <input type="password" class="form-control" name="password" required placeholder="Password Here">
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
@endsection
