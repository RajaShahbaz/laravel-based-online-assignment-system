@extends('layouts.login')
@section('content')

	<meta charset="UTF-8">
	<title>Login </title>

	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/css/fontawesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/css/style.css')}}">



<body class="bg-light">
	<main class="logout-body">
		<div class="logo text-center mt-5">
			{{-- <h2 class="font-weight-bold"><a href="{{route('index')}}">SPEED<span class="text-primary">UP</span></a></h2> --}}
		</div>
		<div class="form m-auto p-5">
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
			{{-- <form action="{{route('admin.postlogin')}}" class="border rounded shadow p-4 bg-white" method="POST"> --}}
			<form action="{{route('postlogin')}}" class="border rounded shadow p-4 bg-white" method="POST">
                @csrf
				<h4 class="text-center text-uppercase font-weight-bold">Login Form</h4>
				<div class="form-group">
					<label for="email">Email:</label>
					<input type="email" id="email" class="form-control" placeholder="Email" name="email">
				</div>
				<div class="form-group">
					<label for="password">Password:</label>
					<input type="password" id="password"  class="form-control" placeholder="Password" name="password">

				</div>
				<div class="form-group">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="remember">
						<label class="custom-control-label" for="remember">Remember Me</label>
					</div>
				</div>

				<div class="form-group">
					<input type="submit" class="btn btn-primary form-control" value="Login">
				</div>
				{{-- <a href="resetpass.html">Reset Password?</a> --}}
			</form>
			{{-- <div class="border text-center mt-2 rounded shadow p-3 bg-white">
				{{-- <a href="signup.html">Create an account.</a>
			</div> --}}
		</div>
	</main>

	<script src="{{asset('admin/js/jquery.min.js')}}"></script>
	<script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('admin/js/custom.js')}}"></script>
    <script>
        $(document).ready(function() {
            // Hide the flash message after 10 seconds
            setTimeout(function() {
                $('#flash-message').fadeOut('slow');
            }, 5000);
        });
    </script>
@endsection
