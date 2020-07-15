<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GalleryRequest extends FormRequest
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
            'nama' => 'required',
            'alamat' => 'required',
            'image' => 'file|image|max:1000'
        ];
    }

    public function messages()
     {
         return [
             'image.required' => 'Mohon input gambar baru',
             'image.image' => 'Mohon input file image'
         ];
     }
}
