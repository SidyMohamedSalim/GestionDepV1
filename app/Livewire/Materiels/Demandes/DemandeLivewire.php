<?php

namespace App\Livewire\Materiels\Demandes;

use App\Models\Demande;
use Livewire\Component;

use function PHPUnit\Framework\isEmpty;

class DemandeLivewire extends Component
{

    public $startEditStatusDemande  = false;

    public $status = '';

    function changestartEditStatusDemande()
    {
        $this->startEditStatusDemande = true;
    }

    function changeStatut(string $demandeId)
    {

        $demande = Demande::find($demandeId);


        if (!$demande) {
            session()->flash('success', 'Demande non Trouvé');
            return;
        }


        if ($this->status == '') {
            $this->status = $demande->status;
        }

        $demande['status'] = $this->status;
        $demande->save();

        session()->flash('success', 'Status changé');

        $this->startEditStatusDemande = false;
    }

    function deleteDemande(string $demandeId)
    {
        $demande = Demande::find($demandeId);

        if (!$demande) {
            session()->flash('success', 'Demande non Trouvé');
            return;
        }

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
