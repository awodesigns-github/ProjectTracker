<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampusCourse extends Model
{
    use HasFactory;

    protected $table = "campus_course";
    protected $fillable = ['campus_id', 'course_id'];
    public $timestamps = false;
}
