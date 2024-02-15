<?php

namespace App\Http\Controllers\Relations;

use App\Http\Controllers\Controller;
use App\Http\Requests\bureau\AffectationEnseignantsRequest;
use App\Models\Bureau;
use App\Models\Enseignant;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BureauEnseignantController extends Controller
{
    //


    // AJouter un enseignant a un bureau
    public function affecterBureauEnseignant(Request $request, Enseignant $enseignant)
    {
        $data = $request->validate([
            'bureau_id' => ['numeric', 'required']
        ]);

        $enseignant->bureau()->sync($data);

        return redirect()->route('enseignant.index')->with('success', "Le bureau a ete affecter avec succes");
    }




    // Ajout sur un bureau plusieurs enseignants

    public function showAffecterEnseignantsBureau(Bureau $bureau)
    {
        return view('admin.bureau.addEnseignant', [
            'bureau' => $bureau,
            'enseignants' => Enseignant::all()

        ]);
    }

    public function affecterEnseignantsBureau(Request $request, Bureau $bureau)
    {
        $max = $bureau->capacite;


        $data = $request->validate([
            'enseignants' => [
                'array',
                function ($attribute, $value, $fail) use ($max) {
                    if (count($value) > $max) {
                        $fail("Le bureau dépasse la limite d'enseignants possibles de $max.");
                    }
                },
            ]
        ]);

        $bureau->enseignant()->sync($data['enseignants']);
        return redirect()->route('bureau.index')->with('success', "Enseignants Affecté");
    }
}
