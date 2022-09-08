<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
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
            'title' => 'required',
            'content' => 'required',
            'thumbnail' => 'required|file|mimes:jpg,jpeg,png|max:500000',
            // 'photos.*' => 'required|file|mimes:jpg,jpeg,png|max:500000',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Mohon masukkan judul blog',
            'content.required' => 'Mohon masukkan konten blog',
            'thumbnail.required' => 'Mohon masukkan foto sampul blog',
            'thumbnail.mimes' => 'Foto sampul harus memiliki format jpg, jpeg, atau png',
            'thumbnail.max' => 'Foto sampul harus memiliki ukuran tidak lebih dari 5MB',
            // 'photos.*.mimes' => 'Foto harus memiliki format jpg, jpeg, atau png',
            // 'photos.*.max' => 'Foto harus memiliki ukuran tidak lebih dari 5MB',
        ];
    }
}
