<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $requiredFields = [
            'image'
        ];
        $rules =  [
            'category' => ['required'],
            'tag' => ['required'],
            'article' => ['required'],
            'description' => ['required'],
            'article' => ['required'],
            'image' => 'image|mimes:png,jpg,jpeg|max:2048',
            'title' => 'required|unique:posts,title,' . $this->id . ',id'
        ];

        if ($this->method() == 'POST') {
            foreach ($rules as $field => $rule) {
                if (in_array($field, $requiredFields)) {
                    $rules[$field] .= '|required';
                }
            }
        }

        return $rules;
    }
}
