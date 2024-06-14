<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskStudent extends Model
{
    use HasFactory;

    protected $table = 'task_student';
    protected $fillable = [
        'task_id',
       'student_id'
    ];
}
