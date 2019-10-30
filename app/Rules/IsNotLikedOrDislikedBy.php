<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class IsNotLikedOrDislikedBy implements Rule
{
    public $user;
    public $model;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($user, $model)
    {
        $this->user = $user;
        $this->model = $model;
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
        return ! $this->model->isLikedOrDislikedBy($this->user);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'You can not vote twice!';
    }
}
