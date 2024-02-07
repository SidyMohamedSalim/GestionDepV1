<?php

namespace App\Http\Requests\enseignant;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EnseignantVacataireRequest extends FormRequest
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
            'nom' => ['required'],
            'prenom' => ['required'],
            'email' => ['required', Rule::unique('enseignant_vacataires', 'email')->ignore($this->email, 'email')],
            'date_debut' => ['required'],
            'date_fin' => ['date', 'nullable'],
        ];
    }
}
