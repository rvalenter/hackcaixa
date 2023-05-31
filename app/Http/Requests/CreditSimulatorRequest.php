<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreditSimulatorRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'valorDesejado' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'prazo' => 'required|integer|max:144|min:1',
        ];
    }

    public function messages(): array
    {
        return [
            'valorDesejado.required' => 'O valor desejado deve ser preenchido.',
            'valorDesejado.numeric' => 'O valor desejado deve ser numerico com duas casa.',
            'valorDesejado.regex' => 'O valor desejado deve ser decimal com duas casa.',
            'prazo.required' => 'O prazo deve ser preenchido.',
            'prazo.integer' => 'O prazo deve ser um valor inteiro.',
            'prazo.max' => 'O prazo maximo deve ser menor que 145.',
            'prazo.min' => 'O prazo minimo deve ser maior que 0.',
        ];
    }
}
