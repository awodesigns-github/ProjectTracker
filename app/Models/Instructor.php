<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Instructor extends Model
{
    use HasFactory;

    public function campus(): BelongsTo
    {
        return $this->belongsTo(Campus::class);
    }

    public function cohort(): BelongsToMany
    {
        return $this->belongsToMany(Cohort::class, 'instructor_cohort');
    }

    public function project(): BelongsToMany
    {
        return $this->belongsToMany(Project::class, 'project_instructor');
    }

    public function task(): HasManyThrough
    {
        return $this->hasManyThrough(Task::class, Project::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function instructorsPerCohort()
    {
        return self::with('cohort')->first()->cohort; 
    }

    public static function instructorProjectObject()
    {
        return self::query()->where('user_id', Auth::user()->id)->with('project')->get();
    }

    public static function instructorProjectCount()
    {
        return self::query()->where('user_id', Auth::user()->id)->with('project')->first()->project->count();   
    }

    public static function instructorTasksCountPerProject()
    {
        $projects = self::query()->where('user_id', Auth::user()->id)->with('project')->first()->project;
        
        $taskCount = 0;
        foreach ($projects as $project) {
            $taskCount += $project->task->count();
        }

        return $taskCount;
    }

    public function scopeFilter($query, Request $request)
    {
        $query->when($request->filled('status'), function ($query) use ($request) {
            $query->where('user_id', Auth::user()->id)->with('project');
        });
    }
}
