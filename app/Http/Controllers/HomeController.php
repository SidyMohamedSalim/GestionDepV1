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

    public function index()
    {
        $count_enseignant = Enseignant::count();
        $count_vacataire = EnseignantVacataire::count();
        $count_bureau = Bureau::count();
        $count_stocks = $this->countStocks();

        $enseignants = Enseignant::with('bureau', 'equipement', 'fourniture')->get();

        // dd($enseignants);

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
        $count = Equipement::sum('quantite');
        $data['inventoriee'] = $count;

        $count = Fourniture::sum('quantite');
        $data['notinventoriee'] = $count;

        return $data;
    }

    public function help()
    {
        return view('help');
    }
}
