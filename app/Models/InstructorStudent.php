<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstructorStudent extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "instructor_student";
    protected $fillable = ['instructor_id', 'student_id'];
}
