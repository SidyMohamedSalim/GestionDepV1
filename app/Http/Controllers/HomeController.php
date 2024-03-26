<?php

namespace App\Http\Controllers;

use App\Models\Bureau;
use App\Models\Enseignant;
use App\Models\EnseignantVacataire;
use App\Models\Fourniture;
use App\Models\Materiel;
use App\Models\Equipement;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    function index()
    {

        $count_enseignant = Enseignant::all()->count();
        $count_vacataire = EnseignantVacataire::all()->count();

        $count_bureau = Bureau::all()->count();

        $count_stocks = $this->countStocks();



        return view('dashboard', [
            'count_enseignant' => $count_enseignant,
            'count_vacataire' => $count_vacataire,
            'count_bureau' => $count_bureau,
            'stocks_inventoriee' => $count_stocks["inventoriee"],
            'stocks_not_inventorie' => $count_stocks["notinventoriee"]
        ]);
    }

    private function countStocks(): array
    {
        $data = [];
        $count = 0;
        $acquisitions =  Equipement::all();

        foreach ($acquisitions as $materiel) {
            $count += $materiel->quantite;
        }

        $data['inventoriee'] = $count;
        $count = 0;
        $acquisitions =  Fourniture::all();

        foreach ($acquisitions as $materiel) {
            $count += $materiel->quantite;
        }

        $data['notinventoriee'] = $count;

        return $data;
    }

    public  function help()
    {
        return view('help');
    }
}
