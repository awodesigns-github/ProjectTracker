<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstructorCohort extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "instructor_cohort";
    protected $fillable = ['instructor_id', 'cohort_id'];
}
