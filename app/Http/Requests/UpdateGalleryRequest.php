<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGalleryRequest extends FormRequest
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
            'photo_base64' => 'base64file|base64mimes:jpg,jpeg,png|base64max:200000'
        ];
    }

    public function messages()
    {
        return [
            'photo_base64.base64mimes' => 'Logo harus memiliki format jpg, jpeg, atau png',
            'photo_base64.base64max' => 'Logo harus memiliki ukuran tidak lebih dari 2MB',
        ];
    }
}
