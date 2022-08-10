<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGalleryRequest extends FormRequest
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
            'photos_base64' => 'required|array|min:1',
            'photos_base64.*' => 'required|base64file|base64mimes:jpg,jpeg,png|base64max:250000',
        ];
    }

    public function messages()
    {
        return [
            'photos_base64.required' => 'Mohon masukkan paling tidak satu foto',
            'photos_base64.min' => 'Mohon masukkan paling tidak satu foto',
            'photos_base64.*.base64mimes' => 'Foto harus memiliki format jpg, jpeg, atau png',
            'photos_base64.*.base64max' => 'Foto harus memiliki ukuran tidak lebih dari 2.5MB',
        ];
    }
}
