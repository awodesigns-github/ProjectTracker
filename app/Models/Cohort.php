<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cohort extends Model
{
    use HasFactory;

    public function instructor(): BelongsToMany
    {
        return $this->belongsToMany(Instructor::class, 'instructor_cohort');
    }

    public function cohort(): HasMany
    {
        return $this->hasMany(Student::class);
    }
}
