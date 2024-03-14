<?php

namespace App\Livewire\Acquisition;

use App\Models\Materiel;
use App\Models\Materiels\MaterielAcquisition;
use Livewire\Component;

class AddMultipleAcquisition extends Component
{

    public int $nombre_acquisitions = 1;

    public string $destination = '';
    public string $date_acquisition = '';
    public array  $acquisition = [];

    public string $categorie = 'Fourniture';




    public function increment()
    {
        $this->nombre_acquisitions++;
    }
    public function decrement()
    {
        if ($this->nombre_acquisitions > 1) {
            $this->nombre_acquisitions--;
        }
    }

    public function changeCategorieToEquipement()
    {
        $this->categorie =  "Equipement";
    }

    public function changeCategorieToFourniture()
    {
        $this->categorie = "Fourniture";
    }

    public function saveAcquisitions()
    {

        $data = $this->validate();

        foreach ($data['acquisition'] as $acquisitionData) {
            if (!empty($acquisitionData['materiel_id'])) {
                MaterielAcquisition::create([
                    'materiel_id' => $acquisitionData['materiel_id'],
                    'quantite' => $this->categorie == "Fourniture" ? $acquisitionData['quantite'] : "1",
                    'caracteristiques' => $acquisitionData['carateristiques'] ?? null,
                    'numero_inventaire' => $acquisitionData['numero_inventaire'] ?? null,
                    'destination' => $data['destination'],
                    'date_acquisition' => $data['date_acquisition'],
                ]);
            }
        }

        session()->flash('success', 'Les acquisitions  ont été faites');

        $this->redirectRoute('materiel.materiel_acquisition.index');
    }


    public function render()
    {
        return view('livewire.acquisition.add-multiple-acquisition', [
            'materiels' => Materiel::select(['id', 'designation'])->where('categorie', '=', $this->categorie)->get()
        ]);
    }

    public function rules(): array
    {
        return [
            'destination' => 'required|string',
            'date_acquisition' => 'required|date',
            'acquisition' => ['array', 'required'],
            'acquisition.*.materiel_id' => 'required|exists:materiels,id',
            'acquisition.*.quantite' =>  $this->categorie == "Equipement" ? 'nullable|string' :  'required|integer|min:1',
            'acquisition.*.carateristiques' => 'nullable|string',
            'acquisition.*.numero_inventaire' => $this->categorie == "Fourniture" ? 'nullable|string' : "required|string",
        ];
    }


    public function messages()
    {
        return [
            'destination.required' => 'Le champ destination est requis.',
            'acquisition.required' => "Il faut au moins une acquisition",
            'date_acquisition.required' => 'Le champ date d\'acquisition est requis.',
            'acquisition.*.materiel_id.required' => 'selectionner un materiel.',
            'acquisition.*.numero_inventaire.required' => 'le numero inventaire est requis pour toutes les acquisitions.',
            'acquisition.*.quantite.required' => 'Le champ quantité est requis pour toutes les acquisitions.',
        ];
    }
}
