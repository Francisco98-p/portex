<?php

namespace App\Http\Requests;

use App\Traits\ToastTrigger;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
class StorePatientActivityRequest extends FormRequest
{
    use ToastTrigger;

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
            'activity_id' => ['required', 'integer'],
            'description' => ['required', 'string'],
            'reasons' => ['required', 'string'],
            'goals' => ['required', 'string'],
            'indicators' => ['required', 'string'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'activity_id.required' => 'La actividad es requerida',
            'description.required' => 'La descripción es requerida',
            'reasons.required' => 'Las razones son requeridas',
            'goals.required' => 'Los objetivos son requeridos',
            'indicators.required' => 'Los indicadores son requeridos',
        ];
    }

    /**
     * Personaliza el manejo de errores de validación para lanzar un toast de error.
     *
     * @param  \Illuminate\Contracts\Validation\Validator $validator
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        $this->errorToast($validator->errors()->first());
        parent::failedValidation($validator);
    }
}
