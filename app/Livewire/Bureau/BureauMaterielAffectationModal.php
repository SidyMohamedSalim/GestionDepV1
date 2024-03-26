<?php

namespace App\Livewire\Bureau;

use App\Models\Bureau;
use App\Models\Equipement;
use Barryvdh\DomPDF\Facade\Pdf;
use DateTime;
use Illuminate\Database\Eloquent\Collection;
use LivewireUI\Modal\ModalComponent;

class BureauMaterielAffectationModal extends ModalComponent
{

    public Bureau $bureau;
    public string $quantite = '1';

    public Collection $acquisitions;

    public Equipement $acquisition;


    public string $acquistionIdSelected = '';




    public function updating($property, $value)
    {


        if ($property === 'acquistionIdSelected') {
            $this->acquisition = Equipement::find($value);
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

        $this->bureau->acquisition()->attach($this->acquisition->id, [
            'date_affectation' => new DateTime(),
            "quantite" => 1,
            'signature' => "pending"
        ]);


        $this->acquisition->update([
            'quantite' => ($this->acquisition->quantite - $this->quantite)
        ]);
        $this->acquisition->save();

        $this->reset('quantite');
        $this->dispatch("affectationSaved");

        $pdf = Pdf::loadView('pdf.materiel-affectation', [
            'acquisition' => $this->acquisition,
            'enseignant' => $this->bureau,
            'quantite' => $this->quantite,
        ]);

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->download();
        }, 'decharge' . $this->acquisition->numero_inventaire . $this->bureau->designation . '.pdf');
    }


    public function render()
    {
        return view('livewire.bureau.bureau-materiel-affectation-modal');
    }
}
