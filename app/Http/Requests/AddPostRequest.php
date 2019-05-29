<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPostRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'caption' => 'required|min:4|max:220',
            'image' => 'required|image'
            //
        ];
    }

    public function attributes()
    {
        return [
            'caption' => 'descripcion',
            'image' => 'required,imagen'
        ];
    }

    public function messages()
    {
        return [
            'caption.required' => 'El caption cant be empty',
            'caption.min' => 'Debe tener al menos 4 caracteres',
            'image.required' => 'It can not be empty',
            'image.image' => 'It should be an image'
        ];
    }
}
