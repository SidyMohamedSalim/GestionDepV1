<?php

namespace App\Livewire\Materiel;

use App\Models\Designation;
use App\Models\Reference;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ConditionnalInputLivewire extends Component
{

    public string $name = "";

    public bool $add = false;

    public string $label = "";



    #[Validate('required|min:3')]
    public string $content = '';

    public function addOption()
    {

        $this->validate();


        if ($this->name == 'reference_id') {
            Reference::create([
                'title' => $this->content
            ]);
        }

        if ($this->name == 'designation_id') {
            Designation::create([
                'title' => $this->content
            ]);
        }

        $this->add = false;
        $this->content = '';
        $this->dispatch('saved');
    }


    public function render()
    {

        $options = null;

        if ($this->name == 'reference_id') {
            $options = Reference::all();
        }

        if ($this->name == 'designation_id') {
            $options = Designation::all();
        }

        return view('livewire.materiel.conditionnal-input-livewire', [
            'options' => $options
        ]);
    }
}
