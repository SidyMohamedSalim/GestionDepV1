<?php

namespace App\Http\Requests\Materiels;

use Illuminate\Foundation\Http\FormRequest;

class EquipementRequest extends FormRequest
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
            'destination' => 'required|string',
            'date_acquisition' => 'required|date',
            'acquisition.*.materiel_id' => 'required|exists:materiels,id',
            'acquisition.*.quantite' => 'required|integer|min:1',
            'carateristiques' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'destination.required' => 'Le champ destination est requis.',
            'date_acquisition.required' => 'Le champ date d\'acquisition est requis.',
            'acquisition.*.materiel_id.required' => 'Le champ matériel est requis pour toutes les acquisitions.',
            'acquisition.*.quantite.required' => 'Le champ quantité est requis pour toutes les acquisitions.',
        ];
    }
}
