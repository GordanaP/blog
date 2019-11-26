<?php

namespace App\Http\Requests\Validation;

use App\Rules\IsAuthor;
use App\Rules\HasNoProfile;
use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'ids' => 'sometimes|exists:profiles,id',
            'user_id' => [
                'sometimes','required','exists:users,id',
                new IsAuthor,
                new HasNoProfile
            ],
            'first_name' => 'sometimes|required|max:50',
            'last_name' => 'sometimes|required|max:50',
            'biography' => 'nullable|max:500',
            'image' => 'sometimes|image',
        ];
    }
}
