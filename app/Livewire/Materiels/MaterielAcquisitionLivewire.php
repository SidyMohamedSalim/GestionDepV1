<?php

namespace App\Livewire\Materiels;

use App\Models\Materiels\MaterielAcquisition;
use Livewire\Component;

class MaterielAcquisitionLivewire extends Component
{

    public string $quantite = "1";
    public string $date_acquisition = '';
    public string $materiel_id = "";


    protected $rules = [
        'quantite' => "required",
        'date_acquisition' => "required",
    ];

    public  function  saveAcquisiton()
    {

        $this->validate();
        if (!empty($this->materiel_id)) {
            MaterielAcquisition::create([
                'quantite' => $this->quantite,
                'date_acquisition' => $this->date_acquisition,
                'materiel_id' => $this->materiel_id
            ]);
        }
        $this->dispatch("acquisitionSaved",  $this->materiel_id);
    }


    public function render()
    {
        return view('livewire.materiels.materiel-acquisition-livewire');
    }
}
