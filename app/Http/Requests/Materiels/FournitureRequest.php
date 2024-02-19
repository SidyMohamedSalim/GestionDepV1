<?php

namespace App\Http\Requests\Materiels;

use Illuminate\Foundation\Http\FormRequest;

class FournitureRequest extends FormRequest
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
            'active' => ['nullable'],
            'designation_id' => ['required'],
            'commentaire' => ['nullable'],
            'categorie' => ['required'],
            'type' => ['required'],
            'numero_inventaire' => ['nullable'],
            'date_acquisition' => ['required'],
            'reference_id' => ['required']
        ];
    }
}
