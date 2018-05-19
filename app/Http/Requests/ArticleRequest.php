<?php

namespace App\Http\Requests;

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
        switch($this->method())
        {
            // CREATE
            case 'POST':
                return [
                    'title' => 'required|min:5',
                    'slug' => 'required',
                    'tags' => 'required|array',
                    'original_md' => 'required|min:10',
                    'is_top' => 'required',
                    'first_img' => 'required|url',
                    'keywords' => 'required',
                ];
                // UPDATE
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'title' => 'required',
                    'first_img' => 'required|url',
                    'content' => 'required',
                    'tag_ids' => 'required|array',
                ];
            }
            case 'GET':
            case 'DELETE':
            default:
            {
                return [];
            };
        }
    }

    public function messages()
    {
        return [
            'tag_ids.array' => '必须选择一个标签',
        ];
    }
}
