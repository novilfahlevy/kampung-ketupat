<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSettingRequest extends FormRequest
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
        $rules = [];

        if (!$this->isEmptyString('header_background_base64')) {
            $rules['header_background_base64'] = 'base64file|base64mimes:jpg,jpeg,png|base64max:200000';
        }
        
        return $rules;
    }

    public function messages()
    {
        return [
            'header_background_base64.base64mimes' => 'Foto sampul harus memiliki format jpg, jpeg, atau png',
            'header_background_base64.base64max' => 'Foto sampul harus memiliki ukuran tidak lebih dari 2MB',
        ];
    }
}
