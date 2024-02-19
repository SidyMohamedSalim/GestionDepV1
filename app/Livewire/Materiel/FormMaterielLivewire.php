<?php

namespace App\Livewire\Materiel;

use Livewire\Attributes\Validate;
use Livewire\Component;

class FormMaterielLivewire extends Component
{



    #[Validate('required|min:3')]
    public $content = '';

    public function addOption(string $name)
    {
        $this->validate();


        dd($name, $this->content);
        if ($name == 'reference') {
        } else {
        }
    }


    public function render()
    {
        return view('livewire.materiel.form-materiel-livewire');
    }
}
