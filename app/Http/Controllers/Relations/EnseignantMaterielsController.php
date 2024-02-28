<?php

namespace App\Http\Controllers\Relations;

use App\Http\Controllers\Controller;
use App\Http\Requests\Relations\EnseignantMaterielRequest;
use App\Models\Enseignant;
use App\Models\Materiels\MaterielAcquisition;
use Illuminate\Http\Request;

class EnseignantMaterielsController extends Controller
{
    /**
     *Affection de plusieurs materiels a un enseignant
     */

    public function affecteMaterielToEnseignant(Enseignant $enseignant)
    {
        return view("admin.relations.EnseignantMateriel.materiel-enseignant-form", [
            'enseignant' => $enseignant,
            'acquisitions' => MaterielAcquisition::with("materiel")->get()
        ]);
    }

    public function storeAffectationMaterielToEnseignant(EnseignantMaterielRequest  $request, Enseignant $enseignant)
    {
    }
}
