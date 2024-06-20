<?php

namespace App\Rules;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidProjectDueDate implements ValidationRule
{

    protected $creationDate;

    public function __construct($creationDate)
    {
        $this->creationDate = $creationDate;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $projectDueDate = Carbon::parse($value);
        $projectCreationDate = Carbon::parse($this->creationDate);

        if ($projectDueDate->lt($projectCreationDate)) {
            $fail('Project due date must be after or equal to the project creation date');
        }
    }
}
