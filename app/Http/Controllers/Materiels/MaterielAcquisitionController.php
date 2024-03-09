<?php

namespace App\Http\Controllers\Materiels;

use App\Http\Controllers\Controller;
use App\Http\Requests\Materiels\MaterielAcquisitionRequest;
use App\Models\Materiel;
use App\Models\Materiels\MaterielAcquisition;
use Illuminate\Http\Request;

class MaterielAcquisitionController extends Controller
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
            'MaterielAcquisition' => new MaterielAcquisition(),
            'materiels' => Materiel::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MaterielAcquisitionRequest $request)
    {
        $data  = $request->validated();

        dd($data);


        foreach ($data['acquisition'] as $acquisitionData) {
            MaterielAcquisition::create([
                'materiel_id' => $acquisitionData['materiel_id'],
                'quantite' => $acquisitionData['quantite'],
                'caracteristiques' => $data['caracteristiques'],
                'destination' => $data['destination'],
                'date_acquisition' => $data['date_acquisition'],
            ]);
        }

        return redirect()->route('materiel.materiel_acquisition.index')->with('success', 'Les acquisitions  ont ete faites ');
    }

    /**
     * Display the specified resource.
     */
    public function show(MaterielAcquisition $materiel_acquisition)
    {
        return view('admin.Materiel.acquisition.show', [
            'acquisition' => $materiel_acquisition
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MaterielAcquisition $materiel_acquisition)
    {
        //
        return view('admin.Materiel.acquisition.form', [
            'materiel_acquisition' => $materiel_acquisition
        ]);;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MaterielAcquisitionRequest $request, MaterielAcquisition $materiel_acquisition)
    {
        $materiel_acquisition->update($request->validated());
        return redirect()->route('materiel.materiel_acquisition.index')->with('success', 'MaterielAcquisition modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MaterielAcquisition $materiel_acquisition)
    {
        //
        $materiel_acquisition->delete();
        return redirect()->route('materiel.materiel_acquisition.index')->with('success', 'MaterielAcquisition supprimé');
    }
}
