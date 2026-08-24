<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class AlphaNumericUsername implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!preg_match('/^[A-Za-z0-9]+$/', $value)) {
            $fail('The :attribute must contain only letters and numbers.');
        }
    }
}