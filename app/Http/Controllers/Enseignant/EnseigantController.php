<?php

namespace App\Http\Controllers\Enseignant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Enseignant\EnseignantRequest;
use App\Models\Bureau;
use App\Models\Enseignant;

class EnseigantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.enseignant.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.enseignant.form', ['enseignant' => new Enseignant()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EnseignantRequest $request)
    {

        Enseignant::create($request->validated());

        return redirect()->route('enseignant.index')->with('success', 'Enseignant Créé avec Success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Enseignant $enseignant)
    {

        //
        return view('admin.enseignant.show', [
            'enseignant' => $enseignant
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enseignant $enseignant)
    {
        return view('admin.enseignant.form', [
            'enseignant' => $enseignant
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EnseignantRequest $request, Enseignant $enseignant)
    {


        $enseignant->update($request->validated());

        return redirect()->route('enseignant.index')->with('success', 'Enseignant Modifié avec Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enseignant $enseignant)
    {
        //
        $enseignant->delete();
        return redirect()->route('enseignant.index')->with('success', 'Enseignant Supprimé avec Success');
    }
}
