<?php

namespace App\Livewire\Materiel;

use App\Models\Designation;
use App\Models\Reference;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ConditionnalInputLivewire extends Component
{

    public string $name = "";

    public bool $add = false;

    public string $label = "";

    public string $table_name = "";


    public function mount()
    {

        $this->table_name = ($this->name == 'reference') ? "references" : "designations";
    }

    public string $content = '';

    public function rules()
    {
        return [
            'content' => [
                'required',
                Rule::unique($this->table_name, 'title'),
            ],
        ];
    }


    public function addOption()
    {

        $this->validate();


        if ($this->name == 'reference') {
            Reference::create([
                'title' => $this->content
            ]);
        }

        if ($this->name == 'designation') {
            Designation::create([
                'title' => $this->content
            ]);
        }

        $this->add = false;
        $this->content = '';
        $this->dispatch('refresh-page');
    }


    public function render()
    {


        return view('livewire.materiel.conditionnal-input-livewire');
    }
}
