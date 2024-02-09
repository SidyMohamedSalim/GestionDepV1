<?php

namespace App\Http\Controllers\Relations;

use App\Http\Controllers\Controller;
use App\Http\Requests\bureau\AffectationEnseignantsRequest;
use App\Models\Bureau;
use App\Models\Enseignant;
use Illuminate\Http\Request;

class BureauEnseignantController extends Controller
{
    //

    public function affecterBureauEnseignant(Request $request, Enseignant $enseignant)
    {
        $data = $request->validate([
            'bureau_id' => ['numeric', 'required']
        ]);

        $enseignant->bureau()->sync($data);

        return redirect()->route('enseignant.index')->with('success', "Le bureau a ete affecter avec succes");
    }


    public function affecterEnseignantsBureau(Request $request, Bureau $bureau)
    {

        $data = $request->validate([
            'enseignants' => ['required']
        ]);

        $bureau->enseignant()->sync($data['enseignants']);
        return redirect()->route('bureau.index')->with('success', "Mise a jour effectuer affecter avec succes");
    }
}
