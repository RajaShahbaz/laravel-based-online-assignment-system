<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseStudent extends Model
{
    use HasFactory;
    public function courses(){
        return $this->belongsTo(Course::class,'course_id');
    }
    public function students(){
        return $this->belongsTo(User::class,'student_id');
    }
}
