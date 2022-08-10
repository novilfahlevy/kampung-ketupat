<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCollaborationRequest extends FormRequest
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
            'logo_base64' => 'required|base64file|base64mimes:jpg,jpeg,png|base64max:250000'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Mohon masukkan nama pihak',
            'logo_base64.required' => 'Mohon masukkan logo pihak',
            'logo_base64.base64mimes' => 'Logo harus memiliki format jpg, jpeg, atau png',
            'logo_base64.base64max' => 'Logo harus memiliki ukuran tidak lebih dari 2.5MB',
        ];
    }
}
