<?php

namespace App\Livewire;

use App\Models\Bureau;
use App\Models\Enseignant;
use Livewire\Component;
use Livewire\WithPagination;

class BureauLivewire extends Component
{

    use WithPagination;

    public function render()
    {
        return view('livewire.bureau-livewire', [
            'bureaux' => Bureau::paginate(10),
            'enseignants' => Enseignant::all()
        ]);
    }
}
