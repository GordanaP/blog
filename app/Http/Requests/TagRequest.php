<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use App\Rules\AlphaNumDashSpace;
use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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
            'ids' => 'sometimes|exists:tags,id',
            'name' => [
                'sometimes', 'required', 'min:2', 'max:50',
                Rule::unique('tags')->ignore(optional($this->tag)->id),
                new AlphaNumDashSpace
            ],
        ];
    }
}
