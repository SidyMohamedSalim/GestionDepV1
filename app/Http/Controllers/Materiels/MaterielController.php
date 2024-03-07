<?php

namespace App\Http\Controllers\Materiels;

use App\Http\Controllers\Controller;
use App\Http\Requests\Materiels\MaterielRequest;
use App\Models\Enseignant;
use App\Models\Materiel;

class MaterielController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        return view(
            'admin.Materiel.index',
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Materiel.form', [
            'materiel' => new Materiel(),
            'categorie' => 'materiel',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MaterielRequest $request)
    {
        Materiel::create($request->validated());
        return redirect()->route('materiel.materiel.index')->with('success', 'materiel créé');
    }

    /**
     * Display the specified resource.
     */
    public function show(Materiel $materiel)
    {
        return  view(
            'admin.Materiel.show',
            [
                'materiel' => $materiel,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Materiel $materiel)
    {
        //
        return view('admin.Materiel.form', [
            'materiel' => $materiel,

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MaterielRequest $request, Materiel $materiel)
    {

        $materiel->update($request->validated());
        return redirect()->route('materiel.materiel.index')->with('success', 'materiel modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materiel $materiel)
    {
        //p
        $materiel->delete();

        return redirect()->route('materiel.materiel.index')->with('success', 'materiel supprimé');
    }
}
