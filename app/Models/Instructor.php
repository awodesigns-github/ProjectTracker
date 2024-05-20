<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function instructorsCountPerCohort()
    {
        return self::with('cohort')->first()->cohort; 
    }
}
