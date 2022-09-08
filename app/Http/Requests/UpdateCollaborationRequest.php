<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCollaborationRequest extends FormRequest
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
            'logo' => 'file|mimes:jpg,jpeg,png|max:500000'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Mohon masukkan nama pihak',
            'logo.mimes' => 'Logo harus memiliki format jpg, jpeg, atau png',
            'logo.max' => 'Logo harus memiliki ukuran tidak lebih dari 5MB',
        ];
    }
}
