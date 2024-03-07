<?php

namespace App\Livewire\Materiel;

use App\Models\Enseignant;
use App\Models\EnseignantMateriel;
use App\Models\Materiel;
use App\Models\Materiels\MaterielAcquisition;
use Barryvdh\DomPDF\Facade\Pdf;
use DateTime;
use Livewire\Component;

class EnseignantMaterielAffectationModal extends Component
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

        $materielEnseignant  =  $this->acquisition->materiel->enseignant()->attach($this->enseignanIdSelected, [
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
                'enseignant' => Enseignant::find($this->enseignanIdSelected),
                'quantite' => $this->quantite
            ]);

            return response()->streamDownload(function () use ($pdf) {
                echo $pdf->download();
            }, 'decharge' . $this->acquisition->numero_inventaire . $materielEnseignant->enseignant->nom . '.pdf');
        }
        $this->reset('enseignanIdSelected');
    }


    public function render()
    {
        return view('livewire.materiel.enseignant-materiel-affectation-modal', [
            'enseignants' => Enseignant::all()
        ]);
    }
}
