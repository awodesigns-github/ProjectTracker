<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Support\Facades\Auth;

class Student extends Model implements Authenticatable
{
    use AuthenticatableTrait;
    use HasFactory;

    protected $fillable = [
        'phone_number',
        'registration_number',
        'github_username',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    public function getAuthIdentifierName()
    {
        return 'email';
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function projects(): HasManyThrough
    {
        return $this->hasManyThrough(Project::class, Team::class);
    }

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    public function cohort(): BelongsTo
    {
        return $this->belongsTo(Cohort::class);
    }

    public function campus(): BelongsTo
    {
        return $this->belongsTo(Campus::class);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function module(): BelongsToMany
    {
        return $this->belongsToMany(Module::class,'module_student');
    }

    public function instructor(): BelongsToMany
    {
        return $this->belongsToMany(Instructor::class, 'instructor_student');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function task(): BelongsToMany
    {
        return $this->belongsToMany(Task::class, 'task_student')->withPivot('status')->withTimestamps();
    }

    public static function studentProjects()
    {
        return self::query()->where('user_id', Auth::user()->id)->first()->module;
    }

    public static function studentProjectCount()
    {
        $modules = self::query()->where('user_id', Auth::user()->id)->first()->module;

        $projectCount = 0;
        foreach ($modules as $module) {
            $projectCount += $module->project->where('status', 'O')->count();
        }

        return $projectCount;
    }

    public static function completedTasks($studentId)
    {
        $completeTasks = Student::with(['task' => function ($query) {
            $query->select('tasks.id', 'task_name', 'task_description', 'task_student.status')->where('task_student.status', 'C');
        }])->findOrFail($studentId);

        return $completeTasks;
    }

    public static function pendingTasks($studentId)
    {
        $incompleteTasks = Student::with(['task' => function ($query) {
            $query->select('tasks.id', 'task_name', 'task_description', 'task_student.status')->where('task_student.status', 'I');
        }])->findOrFail($studentId);

        return $incompleteTasks;
    }
}
