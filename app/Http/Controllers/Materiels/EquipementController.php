<?php

namespace App\Http\Controllers\materiels;

use App\Http\Controllers\Controller;
use App\Http\Requests\Materiels\EquipementRequest;
use App\Models\Equipement;
use App\Models\Materiel;
use App\Models\Reference;
use Illuminate\Http\Request;

class EquipementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'admin.Materiel.index',
            [
                'categorie' => 'Equipement'
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Materiel.form', [
            'materiel' => new Equipement(),
            'categorie' => 'Equipement',
            'designations' => Materiel::all(),
            'references' => Reference::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EquipementRequest $request)
    {
        Equipement::create($request->validated());
        return redirect()->route('materiel.equipement.index')->with('success', 'Equipement créé');
    }

    /**
     * Display the specified resource.
     */
    public function show(Equipement $equipement)
    {
        return $equipement;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipement $equipement)
    {
        //
        return view('admin.Materiel.form', [
            'materiel' => $equipement,
            'categorie' => 'Equipement',
            'designations' => Materiel::all(),
            'references' => Reference::all()
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
