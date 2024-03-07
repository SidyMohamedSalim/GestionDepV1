<?php

namespace App\Http\Requests\Materiels;

use Illuminate\Foundation\Http\FormRequest;

class MaterielRequest extends FormRequest
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
            'designation' => ['required'],
            'commentaire' => ['nullable'],
            'categorie' => ['required'],
            'type' => ['required'],
            'reference' => ['nullable']
        ];
    }
}