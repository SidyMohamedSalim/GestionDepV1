<?php

namespace App\Http\Requests\Materiels;

use Illuminate\Foundation\Http\FormRequest;

class MaterielAcquisitionRequest extends FormRequest
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
            'quantite' => ['required'],
            'date_acquisition',
            'materiel_id'
        ];
    }
}