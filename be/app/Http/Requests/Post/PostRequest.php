<?php

namespace App\Http\Requests\Post;

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
        return [
            //
            'title'=>'required|min:3|max:250|unique:post,title',
            'category_id'=>'required',
            'desc'=>'required|min:3',
            'body'=>'required|min:10',
            'active'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'title.required'=>'title is required',
            'title.min'=>'title is less than 3 character',
            'title.max'=>'title is less than 250 character',
            'body.required'=>'body is required',
            'body.min'=>'body is less than 10 character',
            'active.required'=>'active is required'
        ];
    }
}
