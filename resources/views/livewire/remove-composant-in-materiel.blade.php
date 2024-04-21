<div>
    <h2 class="text-lg font-medium text-gray-900">
        {{ __('Voulez-vous Vraiment Supprimer ?') }}
    </h2>

    <div class="flex justify-end mt-6">
        <x-secondary-button x-on:click="$dispatch('close')">
            {{ __('Cancel') }}
        </x-secondary-button>

        <x-danger-button class="ms-3" wire:click='removeComponant'>
            {{ __('Delete') }}
        </x-danger-button>
    </div>
</div>
