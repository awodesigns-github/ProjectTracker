<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Project extends Model
{
    use SoftDeletes;

    protected $dates = ['created_at', 'due_date', 'updated_at'];

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


    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($project) {
            $project->instructors()->detach();
            $project->team()->detach();
            $project->task()->delete();
        });

        static::creating(function ($project) {
            if (is_null($project->created_at)) {
                $project->created_at = Carbon::now();
            }

            if (is_null($project->due_date)) {
                $project->due_date = Carbon::parse($project->created_at)->addDays(10)->format('Y-m-d H:i:s');
            }
        });
    }

    public function getDaysRemainingAttribute()
    {
        if ($this->created_at && $this->due_date) {
            $dueDate = Carbon::parse($this->due_date);
            $createdDate = Carbon::parse($this->created_at);
            $daysRemaining = $createdDate->diffInDays($dueDate);

            return $daysRemaining;
        }
        return null;
    }
}
