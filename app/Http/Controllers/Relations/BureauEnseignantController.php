<?php

namespace App\Http\Controllers\Relations;

use App\Http\Controllers\Controller;
use App\Models\Enseignant;
use Illuminate\Http\Request;

class BureauEnseignantController extends Controller
{
    //

    public function affecterEnseignantBureau(Request $request, Enseignant $enseignant)
    {
        $data = $request->validate([
            'bureau_id' => ['numeric', 'required']
        ]);


        $enseignant->bureau()->sync($data);

        return redirect()->route('enseignant.index')->with('success', "Le bureau a ete affecter avec succes");
    }
}
