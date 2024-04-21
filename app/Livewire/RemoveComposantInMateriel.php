<?php

namespace App\Livewire;

use App\Models\Equipement;
use App\Models\Fourniture;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class RemoveComposantInMateriel extends ModalComponent
{

    public  Fourniture $composant;
    public Equipement $materiel;



    public function removeComponant()
    {
        $this->composant->quantite += $this->composant->equipements()->wherePivot('equipement_id', $this->materiel->id)->first()->pivot->quantite;

        $this->composant->save();
        $this->composant->equipements()->detach($this->materiel->id);

        $this->closeModal();
        $this->reset("composant");
        $this->closeModalWithEvents(['refreshPage']);


        session()->flash('success', 'le composant a été retiré avec succes');
    }

    public function render()
    {
        return view('livewire.remove-composant-in-materiel');
    }
}
