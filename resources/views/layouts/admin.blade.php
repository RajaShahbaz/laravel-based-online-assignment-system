<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin-Dashboad</title>

        <!--Stylesheets-->
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/favicon.png') }}">
        <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('admin/css/fontawesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
<link rel="stylesheet" href="{{ asset('vendor/viewerjs/viewer.min.css') }}">
    <script src="{{ asset('vendor/viewerjs/viewer.min.js') }}"></script>
    </head>
    <body>
   <!--Logo Area Start-->
   <div class="logo-area">
    <div class="logo bg-primary text-white">
        <a href=""><img src="{{asset('assets/images/logo.png')}}" style="width:90%" alt=""></a>
    </div>
    <div class="menu-icon bg-primary text-white">
        <i class="fas fa-bars"></i>
    </div>
</div>
<!--Logo Area End-->
@php
    $logged_in=auth()->user();
    if(empty($logged_in)){
        header('Location: ' . '/login');
        exit();
    }
     $logged_in=auth()->user()->role;
@endphp

<!--Sidebar Start-->
<div class="sidebar bg-dark">
    <ul>
        <li class="nav-title text-white">Navigation</li>
        <li><a href="{{route('admin.dashboard')}}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
        @php
                  $user = Auth::user();
        @endphp
            {{-- @if ($logged_in=='admin') --}}
          <li class="has-child"><a href=""><i class="fa fa-user-check"></i> Admins</a>
            <ul class="children">
                <li><a href="{{route('admins')}}">All Admins</a></li>
                <li><a href="{{route('add_admin')}}">Add Admin</a></li>
            </ul>

        </li>
        <li class="has-child"><a href=""><i class="fas fa-users"></i> Users</a>
            <ul class="children">
                <li><a href="{{route('all_users')}}">All Users</a></li>
                <li><a href="{{route('add_user')}}">Add User</a></li>
            </ul>
        </li>
        {{-- @endif --}}
        <li class="has-child"><a href=""><i class="fa fa-book-open"></i> Courses</a>
            <ul class="children">
                <li><a href="{{route('course.index')}}">All Courses</a></li>
                <li><a href="{{route('add_course')}}">Add Course</a></li>
            </ul>
        </li>
        <li class="has-child"><a href=""><i class="fa fa-list"></i> Assignments</a>
            <ul class="children">
                <li><a href="{{route('assignment.index')}}">All Assignments</a></li>
                @if ($logged_in!='student')
                <li><a href="{{route('assignment.create')}}">Add Assignment</a></li>
                @endif
                {{-- <li><a href="{{route('assignment.create')}}">Upload Assignment</a></li> --}}

            </ul>
        </li>

        <li><a href=""><i class="fab fa-wpforms"></i> Contacts</a></li>

    </ul>
</div>
<!--Sidebar End-->

<!--Header Start-->
<div class="topbar bg-primary">
    <div class="dropdown profile-dropdown">
        <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            @php
            $url=Storage::url('images/'.$user->image)
            @endphp
            <img src="{{$url}} " class="width-40 round-img" alt="Image">
        </a>
        <div class="dropdown-menu">
            <ul>
                {{-- <li><a class="dropdown-item" href="#">My Account</a></li> --}}
                 <li><a class="dropdown-item" href="{{route('user.show',['user'=>$user->id])}}">Settings</a></li>
                {{-- <li><a class="dropdown-item" href="#">Products</a></li>
                <li><a class="dropdown-item" href="#">Downloads</a></li>
                <li><a class="dropdown-item" href="#">My Cart</a></li> --}}
                <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
            </ul>
        </div>
    </div>
</div>
<!--Header End-->
            @yield('content')



    <!--Javascripts-->
    <script src="{{asset('admin/js/jquery.min.js')}}"></script>
    <script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/js/plugins/chart/d3.min.js')}}"></script>
    <script src="{{asset('admin/js/plugins/chart/chart.min.js')}}"></script>
    <script src="{{asset('admin/js/plugins/chart/initiate.js')}}"></script>
    <script src="{{asset('admin/js/custom.js')}}"></script>



    </body>
</html>
