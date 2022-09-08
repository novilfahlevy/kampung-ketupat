<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
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
            'title' => 'required',
            'content' => 'required',
            // 'photos.*' => 'required|file|mimes:jpg,jpeg,png|max:500000',
        ];

        if ($this->exists('thumbnail') && !$this->isEmptyString('thumbnail')) {
            $rules['thumbnail'] = 'file|mimes:jpg,jpeg,png|max:500000';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'title.required' => 'Mohon masukkan judul blog',
            'content.required' => 'Mohon masukkan konten blog',
            'thumbnail.mimes' => 'Foto sampul harus memiliki format jpg, jpeg, atau png',
            'thumbnail.max' => 'Foto sampul harus memiliki ukuran tidak lebih dari 5MB',
            // 'photos.*.mimes' => 'Foto harus memiliki format jpg, jpeg, atau png',
            // 'photos.*.max' => 'Foto harus memiliki ukuran tidak lebih dari 5MB',
        ];
    }
}
