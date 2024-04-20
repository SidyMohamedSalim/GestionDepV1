<x-app-layout>


    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Ajouter une nouvelle demande') }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto justify-center">
        <livewire:materiels.demandes.add-demande />
    </div>
</x-app-layout>
