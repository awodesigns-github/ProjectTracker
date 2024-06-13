<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstructorModule extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "instructor_module";
    protected $fillable = ['instructor_id','module_id'];
}
