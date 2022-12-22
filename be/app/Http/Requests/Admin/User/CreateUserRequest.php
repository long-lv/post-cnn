<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class CreateUserRequest extends FormRequest
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
        $request = $this->request->all();
        return [
            //
            'name' => ['required', 'max:30','min:3', Rule::unique('user')->ignore($request['name'], 'id')],
            'email' => ['required', 'email', 'max:60', Rule::unique('user')->ignore($request['email'], 'id')],
            'password'=>'required|min:5|max:15',
            'role_id'=>'required|numeric',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>"name is required",
            'name.min'=>'name not be less than 03 characters',
            'name.max'=>'name no more than 20 characters',
            'email.required'=>"email is required",
            'email.email'=>"email is not format",
            'email.unique'=>"email already exists",
            'password.required'=>"password is required",
            'password.min'=>'password not be less than 05 characters',
            'password.max'=>'password no more than 15 characters',
            'role.required'=>'role is required',
            'role.numeric'=>'role is numeric'
        ];
    }
}
