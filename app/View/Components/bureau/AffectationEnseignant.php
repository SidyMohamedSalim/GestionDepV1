<?php

namespace App\View\Components\bureau;

use App\Models\Bureau;
use App\Models\Enseignant;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class AffectationEnseignant extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Bureau $bureau, public Collection $enseignants)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view(
            'components.bureau.affectation-enseignant',
        );
    }
}
