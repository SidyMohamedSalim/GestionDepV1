<?php

namespace App\Livewire;

use App\Models\Equipement;
use App\Models\Fourniture;
use Livewire\Component;

class RemoveComposantInMateriel extends Component
{

    public  Fourniture $composant;
    public Equipement $materiel;



    public function removeComponant()
    {
        $this->composant->quantite += $this->composant->equipements()->wherePivot('equipement_id', $this->materiel->id)->first()->pivot->quantite;

        $this->composant->save();
        $this->composant->equipements()->detach($this->materiel->id);

        session()->flash('success', 'le composant a été retiré avec succes');
    }

    public function render()
    {
        return view('livewire.remove-composant-in-materiel');
    }
}
