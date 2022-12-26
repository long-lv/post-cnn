<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
            'name'=>['required','min:3','max:100',Rule::unique('category','name')->ignore($this->categories)],
        ];
    }
    public function messages()
    {
        return [
            //
            'name.required'=>'name is required',
            'name.min'=>'nam is less than 3 characters',
            'name.max'=>'name is big less than 30 characters',
            'name.unique'=>'name is unique',
        ];
    }
}
