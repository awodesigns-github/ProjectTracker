<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_name',
        'task_description',
        'status',
        'project_id',
        'task_url'
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function student(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'task_student')->withPivot('status')->withTimestamps();
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($task) {
            if (is_null($task->due_date)) {
                $task->task_due_date = Carbon::parse($task->created_at)->addDays(2)->format('Y-m-d H:i:s');
            }
        });
    }

    public function getDaysRemainingAttribute()
    {
        if ($this->created_at && $this->task_due_date) {
            $dueDate = Carbon::parse($this->task_due_date);
            $createdDate = Carbon::parse($this->created_at);
            $daysRemaining = $createdDate->diffInDays($dueDate);

            return $daysRemaining;
        }
        return null;
    }
}
