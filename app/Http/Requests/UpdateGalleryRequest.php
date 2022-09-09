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
        if ($this->has('photo')) {
            return [
                'photo' => 'file|mimes:jpg,jpeg,png|max:500000',
            ];
        } else if ($this->has('youtube_url')) {
            return [
                'youtube_url' => 'required'
            ];
        }
    }

    public function messages()
    {
        return [
            'youtube_url.required' => 'Mohon masukkan link youtube yang ingin diunggah',
            'photo.mimes' => 'Logo harus memiliki format jpg, jpeg, atau png',
            'photo.max' => 'Logo harus memiliki ukuran tidak lebih dari 5MB',
        ];
    }
}
