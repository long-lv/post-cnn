<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'password'=>'required|min:5|max:15',
            'role_id'=>'required|numeric',
        ];
    }
    public function messages()
    {
        return [
            'password.required'=>"password is required",
            'password.min'=>'password not be less than 05 characters',
            'password.max'=>'password no more than 15 characters',
            'role.required'=>'role is required',
            'role.numeric'=>'role is numeric'
        ];
    }
}
