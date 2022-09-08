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
            'photo' => 'file|mimes:jpg,jpeg,png|max:500000'
        ];
    }

    public function messages()
    {
        return [
            'photo.mimes' => 'Logo harus memiliki format jpg, jpeg, atau png',
            'photo.max' => 'Logo harus memiliki ukuran tidak lebih dari 5MB',
        ];
    }
}
