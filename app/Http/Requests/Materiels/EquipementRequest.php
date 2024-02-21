<?php

namespace App\Http\Requests\Materiels;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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

        dd();
        return [
            'active' => ['nullable'],
            'designation' => ['required'],
            'commentaire' => ['nullable'],
            'type' => ['required'],
            'categorie' => ['required'],
            'numero_inventaire' => ['required'],
            'reference' => ['required']
        ];
    }
}
