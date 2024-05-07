<?php

namespace App\Http\Controllers\Enseignant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Enseignant\MaterielRestitutionRequest;
use App\Http\Requests\MaterielRestitutionBureauRequest;
use App\Http\Requests\Materiels\MaterielRequest;
use App\Models\Bureau;
use App\Models\Enseignant;
use App\Models\Materiel;
use App\Models\MaterielRestitution;
use App\Models\Equipement;
use Barryvdh\DomPDF\Facade\Pdf;
use DateTime;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MaterielRestitutionController extends Controller
{


    public function restoreEquipementEnseignant(MaterielRestitutionRequest $request, Enseignant $enseignant, Equipement $acquisition)
    {

        $data = $request->validated();


        $lastRestitutionEnseignant = MaterielRestitution::query()->where("enseignant_id", "=", $enseignant->id)->where('equipement_id', "=", $acquisition->id)->limit(1)->get();


        if (count($lastRestitutionEnseignant) > 0) {
            $lastRestitutionEnseignant[0]->delete();
        }


        MaterielRestitution::create([
            'equipement_id' => $data['affectation_id'],
            'enseignant_id' => $enseignant->id,
            'date_restitution' => new DateTime(),
            'designation' => $acquisition->materiel->designation,
            'numero_inventaire' => $acquisition->numero_inventaire
        ]);

        $acquisition->quantite = 1;
        $acquisition->nbre_restitution = $acquisition->nbre_restitution + 1;
        $acquisition->save();
        $acquisition->enseignant()->detach($enseignant->id);

        // $this->downloadPDf($enseignant, $acquisition);

        return Redirect::back()->with('status', 'restitution reussi !');
    }

    public function restoreEquipementBureau(MaterielRestitutionBureauRequest $request, Bureau $bureau, Equipement $acquisition)
    {

        $data = $request->validated();


        $lastRestitutionBureau = MaterielRestitution::query()->where("bureau_id", "=", $bureau->id)->where('equipement_id', "=", $acquisition->id)->limit(1)->get();


        if (count($lastRestitutionBureau) > 0) {
            $lastRestitutionBureau[0]->delete();
        }

        MaterielRestitution::create([
            'equipement_id' => $data['affectation_id'],
            'bureau_id' => $bureau->id,
            'date_restitution' => new DateTime(),
            'designation' => $acquisition->materiel->designation,
            'numero_inventaire' => $acquisition->numero_inventaire
        ]);

        $acquisition->quantite = 1;
        $acquisition->nbre_restitution = $acquisition->nbre_restitution + 1;
        $acquisition->save();
        $acquisition->bureau()->detach($bureau->id);

        // $this->downloadPDfBureau($bureau, $acquisition);

        return Redirect::back()->with('status', 'restitution reussi !');
    }

    private function downloadPDfBureau(Bureau  $bureau, Equipement $acquisition)
    {
        $pdf = Pdf::loadView('pdf.materiel-restitution-bureau', [
            'materiel' => $acquisition,
            'bureau' => $bureau,
            'quantite' => 1,
        ]);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->download();
        }, 'decharge' . $acquisition->numero_inventaire . $bureau->id . '.pdf');
    }

    private function downloadPDf(Enseignant  $enseignant, Equipement $acquisition)
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
