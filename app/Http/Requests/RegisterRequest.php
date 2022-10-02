<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        return [
            'file' => 'image|mimes:jpeg,png,jpg,svg|max:200',
            'firstname' => 'required|min:3|max:50',
            'surname' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:255|confirmed',
            'password_confirmation' => 'required',
        ];
    }
    public function messages(){
        return [
            'email.unique' => 'Belə bir email artıq mövcuddur',
        ];
    }
}
