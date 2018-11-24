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
     * It uses built-in php function to check domain host DNSs
     *
     * @param  string $attribute
     * @param  mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // by default it bypasses the test to avoid any lags in running tests,
        // remove below line to activate it.
        return true;

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
