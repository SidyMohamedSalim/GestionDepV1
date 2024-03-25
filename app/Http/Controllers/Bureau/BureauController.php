<?php

namespace App\Http\Controllers\Bureau;

use App\Http\Controllers\Controller;
use App\Http\Requests\Bureau\BureauRequest;
use App\Models\Bureau;
use App\Models\Materiels\MaterielAcquisition;
use Illuminate\Database\Eloquent\Builder;

class BureauController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.bureau.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.bureau.form', [
            'bureau' => new Bureau()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BureauRequest $request)
    {
        Bureau::create($request->validated());
        return redirect()->route('bureau.index')->with('success', 'Bureau créé');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bureau $bureau)
    {
        return view('admin.bureau.show', [
            'bureau' => $bureau,
            'composants' => MaterielAcquisition::query()->where('quantite', '>', '0')->whereHas('materiel', function (Builder $query) {
                $query->where('categorie', '=', 'Fourniture');
            })->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bureau $bureau)
    {
        //
        return view('admin.bureau.form', [
            'bureau' => $bureau
        ]);;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BureauRequest $request, Bureau $bureau)
    {
        $bureau->update($request->validated());
        return redirect()->route('bureau.index')->with('success', 'Bureau modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bureau $bureau)
    {
        //
        $bureau->delete();
        return redirect()->route('bureau.index')->with('success', 'Bureau supprimé');
    }
}
