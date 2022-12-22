<?php

namespace App\Http\Requests\Admin\Role;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
            'name'=>'required|min:3|max:30|unique:role,name'
        ];
    }
    public function messages()
    {
        return [
            //
            'name.required'=>'name is required',
            'name.min'=>'name is less than 3 character',
            'name.max'=>'name is more than 30 characters',
            'name.unique'=>'role name is unique',
        ];
    }
}
