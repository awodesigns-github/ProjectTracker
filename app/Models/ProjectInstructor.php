<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectInstructor extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'instructor_id'
    ];
    protected $table = "project_instructor";
    public $timestamps = false;
}
