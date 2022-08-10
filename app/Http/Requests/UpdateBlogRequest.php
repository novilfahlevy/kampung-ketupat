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
            'photos_base64.*' => 'required|base64file|base64mimes:jpg,jpeg,png|base64max:250000',
        ];

        if (!$this->isEmptyString('thumbnail_base64')) {
            $rules['thumbnail_base64'] = 'base64file|base64mimes:jpg,jpeg,png|base64max:250000';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'title.required' => 'Mohon masukkan judul blog',
            'content.required' => 'Mohon masukkan konten blog',
            'thumbnail_base64.base64mimes' => 'Foto sampul harus memiliki format jpg, jpeg, atau png',
            'thumbnail_base64.base64max' => 'Foto sampul harus memiliki ukuran tidak lebih dari 2.5MB',
            'photos_base64.*.base64mimes' => 'Foto harus memiliki format jpg, jpeg, atau png',
            'photos_base64.*.base64max' => 'Foto harus memiliki ukuran tidak lebih dari 2.5MB',
        ];
    }
}
