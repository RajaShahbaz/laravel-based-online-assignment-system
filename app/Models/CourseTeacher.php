<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseTeacher extends Model
{
    use HasFactory;
    public function courses(){
        return $this->belongsTo(Course::class,'course_id');
    }
    public function teachers(){
        return $this->belongsTo(User::class,'teacher_id');
    }
}
