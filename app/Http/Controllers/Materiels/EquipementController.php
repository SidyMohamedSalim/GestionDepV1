<?php

namespace App\Http\Controllers\Materiels;

use App\Http\Controllers\Controller;
use App\Http\Requests\Materiels\EquipementRequest;
use App\Models\Materiel;
use App\Models\Equipement;
use Illuminate\Http\Request;

class EquipementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.Materiel.acquisition.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Materiel.acquisition.form', [
            'Equipement' => new Equipement(),

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EquipementRequest $request)
    {
        $data  = $request->validated();

        dd($data);


        foreach ($data['acquisition'] as $acquisitionData) {
            Equipement::create([
                'materiel_id' => $acquisitionData['materiel_id'],
                'quantite' => $acquisitionData['quantite'],
                'caracteristiques' => $data['caracteristiques'],
                'destination' => $data['destination'],
                'date_acquisition' => $data['date_acquisition'],
            ]);
        }

        return redirect()->route('materiel.equipement.index')->with('success', 'Les acquisitions  ont ete faites ');
    }

    /**
     * Display the specified resource.
     */
    public function show(Equipement $equipement)
    {
        return view('admin.Materiel.acquisition.show', [
            'acquisition' => $equipement
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipement $equipement)
    {
        //
        return view('admin.Materiel.acquisition.form', [
            'equipement' => $equipement
        ]);;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EquipementRequest $request, Equipement $equipement)
    {
        $equipement->update($request->validated());
        return redirect()->route('materiel.equipement.index')->with('success', 'Equipement modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipement $equipement)
    {
        //
        $equipement->delete();
        return redirect()->route('materiel.equipement.index')->with('success', 'Equipement supprimé');
    }
}
