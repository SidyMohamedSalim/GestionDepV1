<?php

namespace App\Livewire\Materiel;

use App\Models\Enseignant;
use App\Models\Materiel;
use App\Models\MaterielEnseignant;
use App\Models\Materiels\MaterielAcquisition;
use DateTime;
use LivewireUI\Modal\ModalComponent;

class EnseignantMaterielAffectationModal extends ModalComponent
{

    public string $quantite = '1';

    public MaterielAcquisition $acquisition;

    public string $enseignanIdSelected = '';




    public function updating($property, $value)
    {
    }

    public function boot()
    {
        $this->withValidator(function ($validator) {
            $validator->after(function ($validator) {
                if ($this->quantite > $this->acquisition->quantite) {
                    $validator->errors()->add("quantite", "La quantite ne doit pas etre superieur a celle existante ");
                }
            });
        });
    }


    public function rules()
    {
        return [
            'enseignanIdSelected' => 'required',
            'quantite' => 'required',
        ];
    }
    public function saveAcquisition()
    {
        $this->validate();



        MaterielEnseignant::create([
            "quantite" => $this->quantite,
            "materiel_id" => $this->acquisition->materiel->id,
            'enseignant_id' => $this->enseignanIdSelected,
            'date_affectation' => new DateTime()
        ]);

        $this->acquisition->update([
            'quantite' => ($this->acquisition->quantite - $this->quantite)
        ]);
        $this->acquisition->save();

        $this->reset('quantite');
        $this->dispatch("affectationSaved");
        $this->closeModal();
    }


    public function render()
    {
        return view('livewire.materiel.enseignant-materiel-affectation-modal', [
            'enseignants' => Enseignant::all()
        ]);
    }
}
