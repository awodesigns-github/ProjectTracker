<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
