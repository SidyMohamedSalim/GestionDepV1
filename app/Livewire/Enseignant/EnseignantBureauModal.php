<?php

namespace App\Livewire\Enseignant;

use App\Models\Bureau;
use App\Models\Enseignant;
use LivewireUI\Modal\ModalComponent;

class EnseignantBureauModal extends ModalComponent
{

    public Enseignant $enseignant;

    public function render()
    {


        return view(
            'livewire.enseignant.enseignant-bureau-modal',
            ['bureaux' => Bureau::all()]
        );
    }

    public static function destroyOnClose(): bool
    {
        return true;
    }
}
