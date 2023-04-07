<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProduct extends FormRequest
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
            'name' => 'required',
            'price' => 'required|min:1',
            'description' => 'required',
            'image_url' => 'image|mimes:png,jpg,jpeg,gif,svg'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'This field must not be empty!',
            'price.required' => 'Is this for free?',
            'description.required' => 'What is this use for?'
        ];
    }
}
