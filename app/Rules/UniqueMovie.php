<?php

namespace App\Rules;

use App\Movies;
use Illuminate\Contracts\Validation\Rule;

class UniqueMovie implements Rule
{
    private $year;
    private $action;
    private $id;

    /**
     * Create a new rule instance.
     *
     * @param $year
     * @param $action
     * @param null $id
     */
    public function __construct($year, $action, $id = null)
    {
        $this->year = $year;
        $this->action = $action;
        $this->id = $id;
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
        if($this->action === 'add'){
            return !Movies::where('name', '=', $value)->whereHas('details', function ($query) {
                $query->where('release_year', '=', $this->year);
            })->count();
        }else{
            return !Movies::where('name', '=', $value)->where('id','!=', $this->id)->whereHas('details', function ($query) {
                $query->where('release_year', '=', $this->year);
            })->count();
        }

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Movie already exists in database.';
    }
}
