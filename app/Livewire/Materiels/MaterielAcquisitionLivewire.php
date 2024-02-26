<?php

namespace App\Livewire\Materiels;

use App\Models\Materiel;
use App\Models\Materiels\MaterielAcquisition;
use Livewire\Component;

class MaterielAcquisitionLivewire extends Component
{

    public string $quantite = "1";
    public string $date_acquisition = '';
    public string $numero_inventaire = '';
    public string $caracteristiques = '';
    public Materiel $materiel;


    protected $rules = [
        'quantite' => "required",
        'date_acquisition' => "required",
        'numero_inventaire' => "required",
        'caracteristiques' => "nullable",
        'destination' => "required",
    ];

    public function __construct()
    {
        $this->materiel = new Materiel();
    }

    public  function  saveAcquisiton()
    {

        $this->validate();
        if (!empty($this->materiel->id)) {
            MaterielAcquisition::create([
                'quantite' => $this->quantite,
                'caracteristiques' => $this->caracteristiques,
                'numero_inventaire' => $this->numero_inventaire,
                'numero_inventaire' => $this->numero_inventaire,
                'destination' => $this->destination,
                'materiel_id' => $this->materiel->id
            ]);
        }
        $this->dispatch("acquisitionSaved",  $this->materiel_id);
    }


    public function render()
    {
        return view('livewire.materiels.materiel-acquisition-livewire');
    }
}
