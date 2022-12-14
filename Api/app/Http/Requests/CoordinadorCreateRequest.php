<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoordinadorCreateRequest extends FormRequest
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
            'nomCoordinador' => 'required|min:5|max:16',
            'apeCoordinador' => 'required',
            'tipoDoc' => 'required',
            'numDoc' => 'required|numeric|unique:coordinadors',
            'id_user' => 'required|unique:coordinadors',
            'telefonoCoordinador' => 'required|numeric',
            'id_coordinacion' => 'required|numeric',
            'estado' => 'required'
        ];
    }

    public function messages(){
        
        return [
            'nomCoordinador.required' => 'El nombre es obligatorio',
            'apeCoordinador.required' => 'El apellido es obligatorio',
            'tipoDoc.required' => 'Este campo es requerido',
            'numDoc.unique' => 'Este numero ya esta registrado',
            'numDoc.required' => 'Este campo es obligatorio',
            'id_user.unique' => 'Este correo ya esta en uso',
            'id_user.required' => 'Este campo es obligatorio',
            'telefonoCoordinador.required' => 'Su telefono es obligatorio',
            'id_coordinacion.required' => 'Este campo es obligatorio',
            'estado.required' => 'Opción obligatoria'
        ];
    }
}
