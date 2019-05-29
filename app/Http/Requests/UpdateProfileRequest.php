<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Intervention\Image\Image;

class UpdateProfileRequest extends FormRequest
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
            //
            'title' => 'required|min:3|max:50',
            'description' => 'required|min:10|max:120',
            'url' => 'url',
            'image' => 'image:jpeg,png,svg|max:5120'
        ];


    }

    public function messages()
    {
      return [
          'description.required' => 'La descripcion es requerida'
      ];
    }


}
