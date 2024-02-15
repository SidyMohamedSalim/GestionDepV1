<?php

namespace App\Http\Controllers\enseignant;

use App\Http\Controllers\Controller;
use App\Http\Requests\enseignant\EnseignantVacataireRequest;
use App\Models\EnseignantVacataire;
use Illuminate\Http\Request;

class EnseignantVacataireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.enseignantVacataire.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.enseignantVacataire.form', ['enseignant' => new EnseignantVacataire()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EnseignantVacataireRequest $request)
    {

        EnseignantVacataire::create($request->validated());

        return redirect()->route('vacataire.index')->with('success', 'Enseignant Vacataire Créé avec Success');
    }

    /**
     * Display the specified resource.
     */
    public function show(EnseignantVacataire $vacataire)
    {
        //
        return $vacataire;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EnseignantVacataire $vacataire)
    {
        return view('admin.enseignantVacataire.form', [
            'enseignant' => $vacataire
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EnseignantVacataireRequest $request, EnseignantVacataire $vacataire)
    {


        $vacataire->update($request->validated());

        return redirect()->route('vacataire.index')->with('success', 'Enseignant Vacataire Modifié avec Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EnseignantVacataire $vacataire)
    {
        //
        $vacataire->delete();

        return redirect()->route('vacataire.index')->with('success', 'Enseignant Vacataire Suppimé avec Success');
    }
}
