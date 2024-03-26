<?php

namespace App\Livewire\Materiel;

use App\Models\Enseignant;
use App\Models\EnseignantMateriel;
use App\Models\Fourniture;
use App\Models\Materiel;
use App\Models\Equipement;
use Barryvdh\DomPDF\Facade\Pdf;
use DateTime;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class EnseignantMaterielAffectationModal extends Component
{

    public string $quantite = '1';

    public Collection $enseignants;
    public Fourniture|Equipement $acquisition;

    public string $enseignanIdSelected = '';


    public function updating($property, $value)
    {
    }

    public function boot()
    {
        $this->withValidator(function ($validator) {
            $validator->after(function ($validator) {
                if ($this->quantite > $this->acquisition->quantite) {
                    $validator->errors()->add("quantite", "La quantité ne doit pas être superieur à celle existante ");
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
        $materielEnseignant = '';
        if (!empty($this->acquisition->numero_inventaire)) {
            $materielEnseignant  =  $this->acquisition->enseignant()->attach($this->enseignanIdSelected, [
                'date_affectation' => new DateTime(),
                "quantite" => $this->quantite,
                'signature' =>    "pending"
            ]);
        } else {
            $materielEnseignant  =  $this->acquisition->enseignant()->attach($this->enseignanIdSelected, [
                'date_affectation' => new DateTime(),
                "quantite" => $this->quantite,
            ]);
        }





        $this->acquisition->update([
            'quantite' => ($this->acquisition->quantite - $this->quantite)
        ]);
        $this->acquisition->save();

        $this->reset('quantite');
        $this->dispatch("affectationSaved");

        $enseignant = Enseignant::find($this->enseignanIdSelected);

        if (!empty($this->acquisition->numero_inventaire)) {
            $pdf = Pdf::loadView('pdf.materiel-affectation', [
                'acquisition' => $this->acquisition,
                'enseignant' => $enseignant,
                'quantite' => $this->quantite,
            ]);

            $this->reset('enseignanIdSelected');
            return response()->streamDownload(function () use ($pdf) {
                echo $pdf->download();
            }, 'decharge' . $this->acquisition->numero_inventaire . $enseignant->nom . '.pdf');
        } else {
            $this->reset('enseignanIdSelected');
            return redirect()->back();
        }
    }


    public function render()
    {
        return view('livewire.materiel.enseignant-materiel-affectation-modal');
    }
}
