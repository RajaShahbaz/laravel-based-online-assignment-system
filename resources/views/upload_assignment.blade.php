@extends('layouts.admin')
@section('content')
<div class="main-body bg-light">
    <div class="wrapper p-3">
        <div class="breadcrumb-links">
            <ul class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('admin.dashboard')}}"><i class="fas fa-home"></i></a>
                </li>
                <li class="breadcrumb-item active">Upload-Assignment</li>
            </ul>
        </div>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="card card-primary">
            <div class="card-title">Upload Assignment</div>
            <div class="card-content">
                <form action="{{route('upload_assignment')}}" method="Post" enctype="multipart/form-data">
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
                                <label>Assignment Title</label>
                                <input type="text" class="form-control" value="{{$assignment->assignment_title}}" readonly name="assignment_title" required placeholder="Enter assignment title">
                                <input type="text" class="form-control" value="{{$assignment->id}}" hidden name="assignment_id">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Course Title </label>
                                <input type="text" class="form-control" value="{{$assignment->course->course_title}}" name="course_title" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Uploaded BY</label>
                                <input type="text" value="{{$assignment->teacher->fname. " " . $assignment->teacher->lname }}" class="form-control" name="teacher_name" readonly >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Upload File</label>
                                <input type="file" class="form-control" name="solved_paper" required >
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
