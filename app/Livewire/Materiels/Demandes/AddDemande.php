<?php

namespace App\Livewire\Materiels\Demandes;

use App\Models\Demande;
use App\Models\ItemDemande;
use Livewire\Component;

class AddDemande extends Component
{

    public int $nombre_demandes = 1;
    public string $titre = '';
    public string $date_demande = '';
    public array $demande = [];

    public function increment()
    {
        $this->nombre_demandes++;
    }

    public function decrement()
    {
        $this->nombre_demandes = max(1, $this->nombre_demandes - 1);
    }

    public function saveDemande()
    {
        $data = $this->validate();

        $demandeSaved = Demande::create([
            'titre' => $data['titre'],
            'date_demande' => $data['date_demande'],
        ]);

        $demandeId = $demandeSaved->id;
        foreach ($data['demande'] as $item) {
            if (!empty($demandeId)) {
                $this->createAcquisition($item, $demandeId);
            }
        }

        // Save the demand logic here
        session()->flash('success', 'La demande a été ajouté');
        $this->redirectRoute('archives.demande.index');
    }

    public function createAcquisition($item, $demandeId)
    {

        ItemDemande::create([
            'demande_id' => $demandeId,
            'designation' => $item['designation'],
            'quantite' => $item['quantite'],
            'prix_unitaire' => $item['prix_unitaire'] ?? "0.00",
            'description' => $item['description'] ?? "",
        ]);
    }


    public function render()
    {
        return view('livewire.materiels.demandes.add-demande');
    }


    public function rules(): array
    {
        return [
            'titre' => 'required',
            'date_demande' => 'required|date',
            'demande.*.designation' => 'required',
            'demande.*.quantite' => 'required|numeric|min:1',
            'demande.*.prix_unitaire' => 'nullable|numeric',
            'demande.*.description' => 'nullable',
            'demande' => ['array', 'required'],
        ];
    }


    public function messages()
    {
        return [
            'titre.required' => 'Le titre est requis',
            'date_demande.required' => 'La date de demande est requise',
            'demande.*.designation.required' => 'La désignation est requise',
            'demande.*.quantite.required' => 'La quantité est requise',
            'demande.*.quantite.numeric' => 'La quantité doit être un nombre',
            'demande.*.quantite.min' => 'La quantité doit être supérieure à 0',
            'demande.*.prix_unitaire.numeric' => 'Le prix unitaire doit être un nombre',
            'demande.*.description.nullable' => 'La description doit être une chaîne de caractères',
            'demande.array' => 'La demande doit être un tableau',
            'demande.required' => 'il faut au moins un element dans la demande',
        ];
    }

    public function validationAttributes()
    {
        return [
            'titre' => 'Titre',
            'date_demande' => 'Date de demande',
        ];
    }
}
