<?php

namespace App\Http\Requests;

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
        $rules = [
            'name' => 'required',
            'email' => 'required',
        ];

        // Check if password is want to be changed
        if (!$this->isEmptyString('password')) {
            $rules['password'] = 'min:8|confirmed';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email tidak valid',
            'password.min' => 'Password minimal harus berisi 8 digit karakter',
            'password.confirmed' => 'Password tidak cocok',
        ];
    }
}
