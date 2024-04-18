<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'min:2'],
            'middle_name' => ['sometimes'],
            'last_name' => ['required', 'min:2'],
            'email' => ['required', 'email', 'unique:users,email'],
            'gender' => ['required'],
            'birth_date' => ['required'],
            'password' => ['required', 'min:6', 'confirmed'],
            'g-recaptcha-response' => ['required', 'captcha']
        ];
    }

    public function messages(): array
    {
        return [
            'g-recaptcha-response' => [
                'required' => 'Please verify that you are not a robot.',
                'captcha' => 'Captcha error! Try again later.'
            ]
        ];
    }
}
