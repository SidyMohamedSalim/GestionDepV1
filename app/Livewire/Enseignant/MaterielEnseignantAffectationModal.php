<?php

namespace App\Livewire\Enseignant;

use App\Models\Enseignant;
use App\Models\MaterielEnseignant;
use App\Models\Materiels\MaterielAcquisition;
use DateTime;
use LivewireUI\Modal\ModalComponent;

class MaterielEnseignantAffectationModal extends ModalComponent
{
    public Enseignant $enseignant;
    public string $quantite = '1';

    public MaterielAcquisition $acquisition;

    public string $acquistionIdSelected = '';




    public function updating($property, $value)
    {


        if ($property === 'acquistionIdSelected') {
            $this->acquisition = MaterielAcquisition::find($value);
        }
    }

    public function boot()
    {
        $this->withValidator(function ($validator) {
            $validator->after(function ($validator) {
                if ($this->acquistionIdSelected == '') {
                    $validator->errors()->add("acquistionIdSelected", "Veuillez selectionner d'abord une acquisition ");
                } elseif ($this->quantite > $this->acquisition->quantite) {
                    $validator->errors()->add("quantite", "La quantite ne doit pas etre superieur a celle existante ");
                }
            });
        });
    }


    public function rules()
    {
        return [
            'acquistionIdSelected' => 'required',
            'quantite' => 'required',
        ];
    }
    public function saveAcquisition()
    {
        $this->validate();

        MaterielEnseignant::create([
            "quantite" => $this->quantite,
            "materiel_id" => $this->acquisition->materiel->id,
            'enseignant_id' => $this->enseignant->id,
            'date_affectation' => new DateTime()
        ]);

        $this->acquisition->update([
            'quantite' => ($this->acquisition->quantite - $this->quantite)
        ]);
        $this->acquisition->save();

        $this->dispatch("affectationSaved");
        $this->closeModal();
    }


    public function render()
    {
        return view(
            'livewire.enseignant.materiel-enseignant-affectation-modal',

            [
                'acquisitions' => MaterielAcquisition::with("materiel")->where("quantite", ">", "0")->get()
            ]
        );
    }
}
