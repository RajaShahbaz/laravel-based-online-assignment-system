<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\AssignmentStudent;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AssignmentController extends Controller
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
            $assignments=Assignment::with('course')->latest()->get();
        }elseif($user->role=='teacher'){
            $assignments=Assignment::whereHas('teacher', function ($query) use($user_id) {
                $query->where('users.id',$user_id);
                 })->with('course')->latest()->get();
        }else{
              $assignments=Assignment::whereHas('course.students',function($query) use($user_id){
                $query->where('users.id',$user_id);
              })->with('course')->latest()->get();
        }
        return view('assignments', ['assignments' => $assignments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $user=auth()->user();
        $user_id=$user->id;
        $courses=Course::whereHas('teachers', function ($query) use($user_id) {
            $query->where('users.id',$user_id);
             })->get();

             return view('add_assignment', ['courses' => $courses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $user=auth()->user();
        if(empty($user)){
            return redirect()->route('login');
        }
        $validator = Validator::make($request->all(), [
            'assignment_title' => 'required',
            'deadline' => 'required',
            'course_id'=>'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->with('fail','All fields are required');
        }
        $path = $request->file('paper')
        ->storeAs('public/assignment_teacher', $request->file('paper')->getClientOriginalName());
        $assignment=new Assignment();
        $assignment->course_id=$request->course_id;
        $assignment->teacher_id=$user->id;
        $assignment->status=1;
        $assignment->paper=$path;
        $assignment->assignment_title=$request->assignment_title;
        $assignment->deadline=$request->deadline;
        $assignment->save();
        return redirect()->route('assignment.create')->with('success',"Assignment added successfully");
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
    public function download_assignment($id)
    {
        $assignment=Assignment::find($id);
        $path = storage_path('app/' . $assignment->paper);
        // if (!Storage::disk('public')->exists($assignment->paper)) {
        //     abort(404);
        // }
        return response()->download($path);
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
        if(auth()->user()->role != 'student'){
            $assignment=Assignment::find($id);
            $assignment->delete();
            return redirect()->route('assignment.index')->with('success',"Assignment deleted successfully");
        }else{
            return redirect()->route('assignment.index')->with('fail',"You are not Allow to perform this action");

        }

    }
    public function getuploadform($id)
    {
        $user=auth()->user();
        $user_id=$user->id;
        $assignment=Assignment::where('id',$id)->with(['course','teacher'])->first();
            return view('upload_assignment',['assignment'=>$assignment]);
    }
    public function saveuploadassignment( Request $request)
    {
        $user=auth()->user();
        $user_id=$user->id;
        $file = $request->file('solved_paper');
        $originalName = $file->getClientOriginalName();
        $extension = pathinfo($originalName, PATHINFO_EXTENSION);
        $newName = $user->roll_num."-".$request->course_title."." . $extension;
       $path= $file->storeAs('public/assignment_student',$newName);
        $assignment=new AssignmentStudent();
        $assignment->status="submited";
        $assignment->assignment_id=$request->assignment_id;
        $assignment->student_id=$user_id;
        $assignment->file=$path;
        $assignment->save();
        return redirect()->route('assignment.index')->with('success','Assignment Uploaded successfully');
    }
}
