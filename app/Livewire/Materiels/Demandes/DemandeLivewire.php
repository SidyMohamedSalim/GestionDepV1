<?php

namespace App\Livewire\Materiels\Demandes;

use App\Models\Demande;
use Livewire\Component;

class DemandeLivewire extends Component
{

    function deleteDemande(string $id)
    {
        $demande = Demande::find($id);
        $demande->delete();
        session()->flash('success', 'Demande supprimée');
        $this->redirectRoute('archives.demande.index');
    }

    public function render()
    {

        return
            view('livewire.materiels.demandes.demande-livewire', [
                'demandes' => Demande::query()
                    ->orderBy('created_at', 'desc')
                    ->paginate(5)
            ]);
    }
}
