<?php

namespace App\Http\Requests\CategoryChildren;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryChildrenRequest extends FormRequest
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
            //'name'=>'required|min:3|max:100',
            'name'=>['required','min:3','max:100',Rule::unique('category_children','name')->ignore($this->category_chil)], // category_chill la duong dan cua router
            'created_by'=>'required',
            'parent_category'=>'required',
        ];
    }
    public function messages()
    {
        return [
          'name.required'=>'category name is required',
          'name.min'=>'category chil is less than 3 character',
          'name.max'=>'category chil is max 100 character',
            'name.unique'=>'category chill is unique',
            'created_by.required'=>'created_by is required',
            'parent_category'=>'parent category is required',
        ];
    }
}
