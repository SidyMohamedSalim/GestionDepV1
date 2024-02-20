<?php

namespace App\Http\Controllers\materiels;

use App\Http\Controllers\Controller;
use App\Http\Requests\Materiels\FournitureRequest;
use App\Models\Fourniture;
use App\Models\Materiel;
use App\Models\Reference;
use Illuminate\Http\Request;

class FournitureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        return view(
            'admin.Materiel.index',
            [
                'categorie' => 'Fourniture',

            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Materiel.form', [
            'materiel' => new Fourniture(),
            'categorie' => 'Fourniture',
            'designations' => Materiel::all(),
            'references' => Reference::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FournitureRequest $request)
    {
        Fourniture::create($request->validated());
        return redirect()->route('materiel.fourniture.index')->with('success', 'fourniture créé');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fourniture $fourniture)
    {
        return $fourniture;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fourniture $fourniture)
    {
        //
        return view('admin.Materiel.form', [
            'materiel' => $fourniture,
            'categorie' => 'Fourniture',
            'designations' => Materiel::all(),
            'references' => Reference::all()
        ]);;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FournitureRequest $request, Fourniture $fourniture)
    {
        $fourniture->update($request->validated());
        return redirect()->route('materiel.fourniture.index')->with('success', 'fourniture modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fourniture $fourniture)
    {
        //
        $fourniture->delete();
        return redirect()->route('materiel.fourniture.index')->with('success', 'fourniture supprimé');
    }
}
