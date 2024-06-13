<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Project extends Model
{

    protected $fillable = [
        'name',
        'description',
        'status',
        'module_id'
    ];

    use HasFactory;

    public function instructors(): BelongsToMany
    {
        return $this->belongsToMany(Instructor::class, 'project_instructor');
    }

    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class);
    }

    public function team(): BelongsToMany
    {
        return $this->belongsToMany(Team::class, 'project_team');
    }

    public function task(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    // public function scopeFilter($query, Request $request)
    // {
    //     $query->when($request->filled('status'), function ($query) use ($request) {
    //         $query->where('status', $request->input('status'));
    //     });
    // }
}
