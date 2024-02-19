<?php

namespace App\Http\Controllers\Materiels;

use App\Http\Controllers\Controller;
use App\Http\Requests\Materiels\FournitureRequest;
use App\Models\Designation;
use App\Models\Materiel;
use App\Models\Reference;
use Illuminate\Http\Request;

class MaterielsController extends Controller
{
    //

    public function index()
    {
        return view('admin.Materiel.index');
    }

    public function create()
    {
        return view(
            'admin.Materiel.form',
            [
                'materiel' => new Materiel(),
                'designations' => Designation::all(),
                'references' => Reference::all()
            ]
        );
    }


    public function store(Request $request)
    {

        if ($request->input("categorie") == 'Fourniture') {
            $data  = $request->validate([
                'designation_id' => ['required'],
                'commentaire' => ['nullable'],
                'categorie' => ['required'],
                'type' => ['required'],
                'date_acquisition' => ['required'],
                'reference_id' => ['required']
            ]);
            Materiel::create($data);
        }
        if ($request->input('categorie') == 'Equipement') {
            $data = $request->validate([
                'designation_id' => ['required'],
                'commentaire' => ['nullable'],
                'categorie' => ['required'],
                'type' => ['required'],
                'numero_inventaire' => ['required'],
                'date_acquisition' => ['required'],
                'reference_id' => ['required']
            ]);
            Materiel::create($data);
        }

        return to_route('materiel.index')->with('success', 'materiel  cree');
    }


    public function edit(Materiel $materiel)
    {
        return view('admin.Materiel.form', [
            'materiel' => $materiel,
            'designations' => Designation::all(),
            'references' => Reference::all()
        ]);
    }


    public function update(Request $request, Materiel $materiel)
    {

        return view('admin.Materiel.form');
    }
}
