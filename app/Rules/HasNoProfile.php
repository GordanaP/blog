<?php

namespace App\Rules;

use App\User;
use Illuminate\Contracts\Validation\Rule;

class HasNoProfile implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if(request()->isMethod('post')) {
            return ! optional(User::find($value))->profile;
        } else {
            return ! optional(User::find($value))->profile
            || optional(User::find($value))->profile == request()->route('profile');
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The selected value is invalid.';
    }
}
