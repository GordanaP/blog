<?php

namespace App\Http\Requests\Validation;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'role_id' =>[
                'nullable', 'exists:roles,id'
            ],
            'name' => [
                'required', 'alpha_num', 'max:100',
            ],
            'email' => [
                'required', 'email', 'max:100',
                Rule::unique('users')->ignore(optional($this->user)->id)
            ],
            'generate_password' => [
                'required',
                Rule::in(['auto_generate', 'manually_generate', 'do_not_change']),
            ],
            'password'=> [
                'nullable', 'required_if:generate_password,manually_generate', 'min:8'
            ],
        ];
    }
}
