<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class ModalWrapper extends Component
{

    public $show = false;

    #[On('changeShow')]
    public function onShowChanged()
    {
        $this->show = false;
    }


    public function render()
    {
        return view('livewire.modal-wrapper');
    }
}
