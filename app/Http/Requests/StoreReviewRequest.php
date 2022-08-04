<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReviewRequest extends FormRequest
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
            'email' => 'required',
            'review' => 'required',
            'stars' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Mohon masukkan nama anda',
            'email.required' => 'Mohon masukkan email anda',
            'review.required' => 'Mohon masukkan ulasan anda',
            'stars.required' => 'Mohon masukkan nilai ulasan anda',
        ];
    }
}
