<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'codigo' => 'required|unique:patients',
            'apellidos' => 'required',
            'nombres' => 'required',
            'dni' => 'required|unique:patients',
            'nacimiento' => 'required|date',
            'sexo' => 'required',
            'telefono' => 'required',
            'email' => 'required|email|unique:patients',
            'direccion' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array {
        return [
            'codigo.required' => 'El campo código es obligatorio.',
            'codigo.unique' => 'El código ya está en uso.',
            'apellidos.required' => 'El campo apellidos es obligatorio.',
            'nombres.required' => 'El campo nombres es obligatorio.',
            'dni.required' => 'El campo DNI es obligatorio.',
            'dni.unique' => 'El DNI ya está en uso.',
            'nacimiento.required' => 'El campo fecha de nacimiento es obligatorio.',
            'nacimiento.date' => 'El campo fecha de nacimiento debe ser una fecha válida.',
            'sexo.required' => 'El campo sexo es obligatorio.',
            'telefono.required' => 'El campo teléfono es obligatorio.',
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser una dirección de correo válida.',
            'email.unique' => 'El correo electrónico ya está en uso.',
            'direccion.required' => 'El campo dirección es obligatorio.',
        ];
    }
}
