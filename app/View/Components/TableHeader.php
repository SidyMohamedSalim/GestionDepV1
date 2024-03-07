<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class TableHeader extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $fieldname,
        public string $orderDirection,
        public string $selectedFieldName,
        public string $class = "",
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table-header');
    }
}
