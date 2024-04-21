<?php

namespace App\Livewire\Materiel;

use App\Models\Fourniture;
use App\Models\Equipement;
use DateTime;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class AddComposant extends Component
{

    public Equipement $acquisition;

    public Collection $composants;


    public string $materielIdSelected = '';

    public string $quantite = '1';

    public function rules()
    {
        return [
            'quantite' => 'required',
            'materielIdSelected' => 'required',
        ];
    }

    public function boot()
    {
        $this->withValidator(function ($validator) {
            $composant = Fourniture::find($this->materielIdSelected);

            $validator->after(function ($validator) use ($composant) {
                if ($this->materielIdSelected == '') {
                    $validator->errors()->add("acquistionIdSelected", "Veuillez selectionner d'abord une acquisition ");
                } elseif ($this->quantite > $composant->quantite) {
                    $validator->errors()->add("quantite", "La quantite ne doit pas etre superieur a celle existante ");
                } else
                if ($composant->equipements()->wherePivot('equipement_id', $this->acquisition->id)->exists()) {
                    $validator->errors()->add("quantite", "Le composant a déjà été affecté à ce meme equipement ou à  un équipement similaire.");
                }
            });
        });
    }

    public function saveAcquisition()
    {
        $this->validate();


        $composant = Fourniture::find($this->materielIdSelected);


        // dump($composant);
        $this->acquisition->fournitures()->attach($composant->id, [
            "quantite" => $this->quantite,
            "date_affectation" => new DateTime()
        ]);
        $composant->update([
            'quantite' => ($composant->quantite - $this->quantite)
        ]);
        $composant->save();

        $this->reset('quantite');
        $this->dispatch("affectationSaved");

        session()->flash('success', 'affectation reussi.');

        $this->reset('materielIdSelected');
    }


    public function render()
    {
        return view('livewire.materiel.add-composant');
    }
}
