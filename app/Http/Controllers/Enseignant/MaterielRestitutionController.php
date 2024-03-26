<?php

namespace App\Http\Controllers\Enseignant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Enseignant\MaterielRestitutionRequest;
use App\Http\Requests\Materiels\MaterielRequest;
use App\Models\Enseignant;
use App\Models\Materiel;
use App\Models\MaterielRestitution;
use App\Models\Equipement;
use Barryvdh\DomPDF\Facade\Pdf;
use DateTime;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MaterielRestitutionController extends Controller
{


    public function restore(MaterielRestitutionRequest $request, Equipement $acquisition)
    {

        $data = $request->validated();

        // dd($data, $acquisition);

        $lastRestitution = MaterielRestitution::query()->where("enseignant_id", "=", $data['enseignant_id'])->where('equipement_id', "=", $acquisition->id)->limit(1)->get();

        // if (!empty($lastRestitution[0])) {
        //     $lastRestitution[0]->delete();
        // }


        MaterielRestitution::create([
            'equipement_id' => $data['affectation_id'],
            'enseignant_id' => $data['enseignant_id'],
            'date_restitution' => new DateTime(),
            'designation' => $acquisition->materiel->designation,
            'numero_inventaire' => $acquisition->numero_inventaire
        ]);

        $acquisition->quantite = 1;
        $acquisition->nbre_restitution = $acquisition->nbre_restitution + 1;
        $acquisition->save();
        $enseignant = Enseignant::find($data['enseignant_id']);
        $acquisition->enseignant()->detach($data['enseignant_id']);

        $this->downloadPDf($enseignant, $acquisition);

        return Redirect::back()->with('status', 'restitution reussi !');
    }



    public function downloadPDf(Enseignant $enseignant, Equipement $acquisition)
    {
        $pdf = Pdf::loadView('pdf.materiel-restitution', [
            'materiel' => $acquisition,
            'enseignant' => $enseignant,
            'quantite' => 1,
        ]);


        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->download();
        }, 'decharge' . $acquisition->numero_inventaire . $enseignant->id . '.pdf');
    }
}
