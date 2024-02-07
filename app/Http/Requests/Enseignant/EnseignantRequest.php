<?php

namespace App\Http\Requests\Enseignant;

use App\Models\Enseignant;
use App\Models\Person;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EnseignantRequest extends FormRequest
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
            'email' => ['required', Rule::unique('enseignants', 'email')->ignore($this->email, 'email')],
            'daterecrutement' => ['required'],
            'active' => ['required'],
            'grade' => ['required'],
        ];
    }
}
