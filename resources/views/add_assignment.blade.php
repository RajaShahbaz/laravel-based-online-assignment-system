@extends('layouts.admin')
@section('content')
<div class="main-body bg-light">
    <div class="wrapper p-3">
        <div class="breadcrumb-links">
            <ul class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('admin.dashboard')}}"><i class="fas fa-home"></i></a>
                </li>
                <li class="breadcrumb-item active">Add-Assignment</li>
            </ul>
        </div>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="card card-primary">
            <div class="card-title">Add Assignment</div>
            <div class="card-content">
                <form action="{{route('assignment.store')}}" method="post" enctype="multipart/form-data">
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
                                <label for="category">Select a course:</label>
                                <select id="course_id" class="form-control" required name="course_id">
                                <option value="">Choose a course</option>
                                @foreach ($courses as $course)
                                <option value="{{$course->id}}">{{$course->course_code}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Assignment Title</label>
                                <input type="text" class="form-control" name="assignment_title" required placeholder="Enter assignment title">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Assignment Deadline</label>
                                <input type="datetime-local" class="form-control" name="deadline" required placeholder="submission time">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Attach Questions paper</label>
                                <input type="file" class="form-control" name="paper" required >
                            </div>
                        </div>


                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group" style="text-align: center">
                                <input class="btn btn-primary flat" type="submit" value="Upload">
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
