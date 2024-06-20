<?php

namespace App\Rules;

use App\Models\Project;
use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidTaskDueDate implements ValidationRule
{

    protected $projectId;

    public function __construct($projectId)
    {
        $this->projectId = $projectId;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $project = Project::query()->where('id', $this->projectId)->first();

        if (!$project) {
            $fail('Project not found');
        }

        $taskDueDate = Carbon::parse($value);
        $projectDueDate = Carbon::parse($project->due_date);
        $projectCreationDate = Carbon::parse($project->created_at);

        if ($taskDueDate->gt($projectDueDate)) {
            $fail('Task due date must be before or equal to the project due date');
        }

        if ($taskDueDate->lt($projectCreationDate)) {
            $fail('Task due date must be after or equal to the project creation date');
        }
    }
}
