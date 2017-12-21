<?php

namespace App\Rules;

use App\Movies;
use Illuminate\Contracts\Validation\Rule;

class UniqueMovie implements Rule
{
    private $year;

    /**
     * Create a new rule instance.
     *
     * @param $year
     */
    public function __construct($year)
    {
        $this->year = $year;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
