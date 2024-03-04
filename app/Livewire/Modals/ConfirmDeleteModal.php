<?php

namespace App\Livewire\Modals;

use Livewire\Component;

class ConfirmDeleteModal extends Component
{

    public string $routeName;
    public string $elementId;

    public function render()
    {
        return view('livewire.modals.confirm-delete-modal');
    }

    public static function destroyOnClose(): bool
    {
        return true;
    }
}
