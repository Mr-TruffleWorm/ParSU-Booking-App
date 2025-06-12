<?php
namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Carbon\Carbon;

class TimeNotPassed implements Rule
{
    public function passes($attribute, $value)
    {
        $selectedDateTime = Carbon::parse($value);
        return $selectedDateTime->isAfter(now());
    }

    public function message()
    {
        return 'The selected time must be in the future.';
    }
}
