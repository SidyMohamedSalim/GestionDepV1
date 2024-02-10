<?php

namespace App\Http\Requests\bureau;

use Illuminate\Foundation\Http\FormRequest;

class AffectationEnseignantsRequest extends FormRequest
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
        $max = request("bureau")->capacite;
        return [
            'enseignants' => [
                'array', function ($attribute, $value, $fail) use ($max) {
                    if (count($value) > $max) {
                        $fail("Le bureau dépasse la limite d'enseignants possibles de $max.");
                    }
                },
            ]
        ];
    }
}
