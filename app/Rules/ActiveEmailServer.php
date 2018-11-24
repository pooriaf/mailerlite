<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ActiveEmailServer implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute
     * @param  mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $domain = explode('@', $value);
        if (checkdnsrr($domain[1], "MX") || checkdnsrr($domain[1], "A"))
            return true;

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be based on a active mail host.';
    }
}
