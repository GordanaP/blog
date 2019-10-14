<?php

namespace App\Http\Requests\Validation;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'title' => [
                'required', 'min:5', 'max:100',
                Rule::unique('articles')->ignore($this->article),
            ],
            'excerpt' => 'required|min:5|max:300',
            'body' => 'required|min:5',
            'publish_at' => 'nullable|date_format:Y-m-d|after:today()',
            'status' => 'required|boolean',
        ];
    }
}
