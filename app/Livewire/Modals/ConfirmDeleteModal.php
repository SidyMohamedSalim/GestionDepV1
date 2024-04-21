<?php

namespace App\Livewire\Modals;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class ConfirmDeleteModal extends ModalComponent
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
