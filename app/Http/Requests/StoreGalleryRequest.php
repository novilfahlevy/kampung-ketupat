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
        if ($this->has('photos')) {
            return [
                'photos' => 'required|array|min:1',
                'photos.*' => 'required|file|mimes:jpg,jpeg,png|max:500000',
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
            'photos.required' => 'Mohon masukkan paling tidak satu foto',
            'photos.min' => 'Mohon masukkan paling tidak satu foto',
            'photos.*.mimes' => 'Foto harus memiliki format jpg, jpeg, atau png',
            'photos.*.max' => 'Foto harus memiliki ukuran tidak lebih dari 5MB',
        ];
    }
}
