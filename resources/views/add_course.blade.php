@extends('layouts.admin')
@section('content')

<div class="main-body bg-light">
    <div class="wrapper p-3">
        <div class="breadcrumb-links">
            <ul class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('admin.dashboard')}}"><i class="fas fa-home"></i></a>
                </li>
                <li class="breadcrumb-item active">Add-Course</li>
            </ul>
        </div>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="card card-primary">
            <div class="card-title">Add Course</div>
            <div class="card-content">
                <form action="{{route('course.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            @if (session('success'))
                            <div id="flash-message" class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                            <div class="form-group">
                                <label>Course Code</label>
                                <input type="text" class="form-control" name="course_code" required placeholder="Enter Course Code">
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Course Title</label>
                                <input type="text" class="form-control" name="course_title"required placeholder="Enter Course title">
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Credit Hours</label>
                                <input type="number" class="form-control" name="credit" required placeholder="Enter Credit Hours">
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-12">
                            <div class="form-group" style="text-align: center">
                                <input class="btn btn-primary flat" type="submit" value="Add-Course">
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
@endsection
