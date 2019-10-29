<?php

namespace App\Http\Requests\Validation;

use App\Rules\IsNotLikedOrDislikedBy;
use Illuminate\Foundation\Http\FormRequest;

class CommentLikeRequest extends FormRequest
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
            'is_liked' => [
                'required', 'boolean',
                new IsNotLikedOrDislikedBy($this->user, $this->comment)
            ]
        ];
    }
}
