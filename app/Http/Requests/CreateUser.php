<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUser extends FormRequest
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
            'name' => 'required|min:1',
            'phone' => 'required',
            'email' => 'required|unique:users',
            // 'password' => 'required|confirmed',
            'password' => 'required',
            'status' => 'required',
            'is_admin' => 'required',
        ];
    }

    public function messages()
    {
        return
            [
                'name.required' => 'This field must not be empty!',
                'name.min' => 'This field required at least 3 char!',
                'email.unique' => 'This email has been taken!',
                'status.required' => 'You have to choose!'
            ];
    }
}
