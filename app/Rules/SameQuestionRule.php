<?php

namespace App\Rules;

use App\Models\Question;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class SameQuestionRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param Closure(string): PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if($this->validationRule($value)) {
            $fail('Pergunta já existe');
        }
    }

    /**
     * @param string $value
     * @return bool
     */
    private function validationRule(string $value): bool
    {
        return Question::whereQuestion($value)->exists();
    }
}
