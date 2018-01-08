<?php

namespace App\Rules;

use App\Reservations;
use Illuminate\Contracts\Validation\Rule;

class TicketCount implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    private $seats_available;
    private $tickets_needed;
    private $screening_id;

    public function __construct($seats_available, $tickets_needed, $id)
    {
        $this->seats_available = $seats_available;
        $this->tickets_needed = $tickets_needed;
        $this->screening_id = $id;
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
        return ($this->getReservedTicketsCount() + $this->tickets_needed) <= $this->seats_available;
    }

    public function getReservedTicketsCount(){
        return Reservations::where('showings_id', '=', $this->screening_id)->sum('tickets_count');
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'We don\'t have '.$this->tickets_needed . ' seats available for this screening';
    }
}
