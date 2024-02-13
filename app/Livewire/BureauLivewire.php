<?php

namespace App\Livewire;

use App\Models\Bureau;
use App\Models\Enseignant;
use Livewire\Attributes\Lazy;
use Livewire\Component;
use Livewire\WithPagination;

#[Lazy()]
class BureauLivewire extends Component
{

    use WithPagination;

    //lazy loading
    public function placeholder()
    {
        return view('components.loader');
    }


    public function render()
    {
        return view('livewire.bureau-livewire', [
            'bureaux' => Bureau::paginate(10),
            'enseignants' => Enseignant::all()
        ]);
    }
}
