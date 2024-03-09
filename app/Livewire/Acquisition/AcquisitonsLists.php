<?php

namespace App\Livewire\Acquisition;

use App\Models\Materiel;
use Livewire\Component;

class AcquisitonsLists extends Component
{

    public int $nombre_acquisitions = 1;
    public function increment()
    {
        $this->nombre_acquisitions++;
    }

    public function render()
    {
        return view('livewire.acquisition.acquisitons-lists', [
            'materiels' => Materiel::all()
        ]);
    }
}
