<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectInstructor extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "project_instructor";
    protected $fillable = [
        'project_id',
        'instructor_id'
    ];
}
