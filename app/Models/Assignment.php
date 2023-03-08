<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    public function teacher(){
        return $this->belongsTo(User::class);
    }
    public function course(){
        return $this->belongsTo(Course::class);
    }
    public function assignemnt_student(){
        return $this->hasMany(AssignmentStudent::class);
    }
}
