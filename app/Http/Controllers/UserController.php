<?php

namespace App\Http\Controllers;

use App\Models\CourseStudent;
use App\Models\CourseTeacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $users=User::get();
        return view('users')->with($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('admin.dashboard')->with('success',"Loged-In successfully");
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login')->with('success',"logout Successfullly");
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $user=new User();
        $user->fname=$request->first_name;
        $user->lname=$request->last_name;
        $user->email=$request->email;
        $user->role=$request->user_type;
        $user->password=Hash::make($request->password);
        $user->address=$request->address;
        $user->phone=$request->phone;
        $user->roll_num=$request->roll_num;
        $user->image='placeholder.jpg';
        $user->degree=$request->degree;

        if($request->file('profile_pic')){
            $originalName = $request->file('profile_pic')->getClientOriginalName();
            $path = $request->file('profile_pic')
            ->storeAs('public/images', $request->file('profile_pic')->getClientOriginalName());
            $user->image=$originalName;
        }
        $user->save();

        if($request->user_type=="teacher"){
            foreach ($request->courses as $course) {
                $course_teacher=new CourseTeacher();
                $course_teacher->teacher_id=$user->id;
                $course_teacher->course_id=$course;
                $course_teacher->save();
            }
        }else{
if (!empty($request->courses))
{
    foreach ($request->courses as $course) {
        $course_teacher=new CourseStudent();
        $course_teacher->student_id=$user->id;
        $course_teacher->course_id=$course;
        $course_teacher->save();
    }
}

        }
        return redirect()->back()->with('success','User Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        $user=User::where('id',$id)->with('courses')->first();
        return view('settings', ['user' => $user]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($user)
    {
        $users=User::find($user);
        $users->delete();
        return redirect()->route('all_users')->with('success','User deleted Successfully');
    }
}
