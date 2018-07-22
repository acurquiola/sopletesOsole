<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalidadDescargaRequest extends FormRequest
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
            'file' => 'required',
            'titulo' => 'required | string',
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
            'file.required'   => 'Debe cargar un archivo',
            'titulo.required' => 'El título es requerido',
            'titulo.string' => 'El título debe ser una cadena de caracteres',
        ];
    }
}
