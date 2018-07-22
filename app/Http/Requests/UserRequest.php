<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;


class UserRequest extends FormRequest
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
        $id     =null;
        $userID =$this->route()->parameter('contenido');
        if($userID)
            $id = $userID;
        return [
            'nombre'          => 'required | string ',
            'apellido'        => 'required | string',
            'email'           => 'required | email | unique:users,email,'.$id,
            'username'        => 'required | unique:users,username,'.$id,
            'tipo_usuario_id' => 'required',
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
            'nombre.required'          => 'Debe indicar el nombre del usuario.',
            'apellido.required'        => 'Debe indicar el apellido del usuario.',
            'email.required'           => 'Debe indicar el email del usuario.',
            'username.required'        => 'Debe indicar el username del usuario.',
            'tipo_usuario_id.required' => 'Debe indicar el tipo de usuario.',
            'password.required' => 'Debe indicar la contraseña de ingreso.',
        ];
    }
}
