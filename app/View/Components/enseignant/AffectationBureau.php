<?php

namespace App\View\Components\enseignant;

use App\Models\Bureau;
use App\Models\Enseignant;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AffectationBureau extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Enseignant $enseignant)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view(
            'components.enseignant.affectation-bureau',
            [
                'bureaux' => Bureau::all()
            ]
        );
    }
}
