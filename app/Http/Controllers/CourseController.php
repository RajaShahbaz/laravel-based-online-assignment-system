<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseStudent;
use App\Models\CourseTeacher;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $user=auth()->user();
        $user_id=$user->id;
        if($user->role=='admin'){
            $courses=Course::latest()->get();
        }elseif($user->role=='teacher'){
            $courses=Course::whereHas('teachers', function ($query) use($user_id) {
                $query->where('users.id',$user_id);
                 })->get();
        }else{
            // $courses=Course::with(['students' => function ($query) use($user_id) {
            //   return $query->where('users.id',$user_id);
            // }])->latest()->get();
            $courses=Course::whereHas('students', function ($query) use($user_id) {
             $query->where('users.id',$user_id);
              })->get();
        }
        return view('courses', ['courses' => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $course= new Course();
        $course->course_code=$request->course_code;
        $course->course_title=$request->course_title;
        $course->credit_hours=$request->credit;
        $course->save();
        return redirect()->back()->with('success', "course created succesfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy($id)
    {
if(auth()->user()->role=='admin'){
    $course=Course::find($id);
    $course->delete();
    return redirect()->back()->with('success',"Course deleted successfully");
}else{
    return redirect()->back()->with('fail',"You are not allowed to perform this action");
}
    }
}
