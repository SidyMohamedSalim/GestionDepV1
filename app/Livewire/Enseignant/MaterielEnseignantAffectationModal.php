<?php

namespace App\Livewire\Enseignant;

use App\Models\Enseignant;
use App\Models\EnseignantMateriel;
use App\Models\Materiels\MaterielAcquisition;
use Barryvdh\DomPDF\Facade\Pdf;
use DateTime;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class MaterielEnseignantAffectationModal extends Component
{
    public Enseignant $enseignant;
    public string $quantite = '1';

    public Collection $acquisitions;

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

        $this->enseignant->acquisition()->attach($this->acquisition->id, [
            'date_affectation' => new DateTime(),
            "quantite" => $this->quantite,
        ]);


        $this->acquisition->update([
            'quantite' => ($this->acquisition->quantite - $this->quantite)
        ]);
        $this->acquisition->save();

        $this->reset('quantite');
        $this->dispatch("affectationSaved");

        if (!empty($this->acquisition->numero_inventaire)) {
            $pdf = Pdf::loadView('pdf.materiel-affectation', [
                'acquisition' => $this->acquisition,
                'enseignant' => $this->enseignant,
                'quantite' => $this->quantite,
            ]);

            return response()->streamDownload(function () use ($pdf) {
                echo $pdf->download();
            }, 'decharge' . $this->acquisition->numero_inventaire . $this->enseignant->nom . '.pdf');
        }
    }


    public function render()
    {
        return view(
            'livewire.enseignant.materiel-enseignant-affectation-modal',


        );
    }
}
