<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicioRequest extends FormRequest
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
            'icono'      => 'required | image',
            'file_image' => 'required | image',
            'titulo'     => 'required | string',
            'contenido'  => 'required | string',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'icono.required'      => 'Debe cargar un archivo para el ícono',
            'icono.image'         => 'La imagen debe ser tipo: jpeg, png, bmp, gif, or svg',
            'file_image.required' => 'Debe cargar un archivo para la imagen',
            'file_image.image'    => 'La imagen debe ser tipo: jpeg, png, bmp, gif, or svg',
            'titulo.required'     => 'El título es requerido',
            'titulo.string'       => 'El título debe ser una cadena de caracteres',
            'contenido.required'  => 'El contenido es requerido',
            'contenido.string'    => 'El contenido debe ser una cadena de caracteres',
        ];
    }

}
