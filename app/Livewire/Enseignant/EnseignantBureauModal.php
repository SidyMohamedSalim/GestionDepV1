<?php

namespace App\Livewire\Enseignant;

use App\Models\Bureau;
use App\Models\Enseignant;
use Illuminate\Console\View\Components\Component;

class EnseignantBureauModal extends Component
{

    public Enseignant $enseignant;

    public function render()
    {


        return view(
            'livewire.enseignant.enseignant-bureau-modal',
            ['bureaux' => Bureau::all()]
        );
    }
}
