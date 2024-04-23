<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
    use HasFactory;

    public function module(): BelongsToMany
    {
        return $this->belongsToMany(Module::class, 'module_team');
    }

    public function project(): BelongsToMany
    {
        return $this->belongsToMany(Project::class, 'project_team');
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function student(): HasMany
    {
        return $this->hasMany(Student::class);
    }
}
