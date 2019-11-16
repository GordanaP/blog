<?php

namespace App\Http\Requests\Validation;

use App\Rules\IsAuthor;
use Illuminate\Support\Carbon;
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
            'user_id' => [
                'sometimes','required','exists:users,id', 'min:1',
                new IsAuthor()
            ],
            'title' => [
                'required', 'min:5', 'max:100',
                Rule::unique('articles')->ignore($this->article),
            ],
            'excerpt' => 'required|min:5|max:300',
            'body' => 'required|min:5',
            'category_id' => 'required|exists:categories,id|min:1',
            'tag_id' => 'nullable|exists:tags,id|min:1',
            'image' => 'sometimes|image',
            'is_approved' => 'required|boolean',
            'publish_at' => [
                'nullable','required_if:is_approved,1','date_format:Y-m-d',
                'after:'.Carbon::yesterday()
            ],
        ];
    }
}
