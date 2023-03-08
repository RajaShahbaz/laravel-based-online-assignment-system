<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    public function students(){
    return $this->belongsToMany(User::class,'course_students','course_id', 'student_id');
}
public function teachers(){
    return $this->belongsToMany(User::class,'course_teachers','course_id', 'teacher_id');
}
}
