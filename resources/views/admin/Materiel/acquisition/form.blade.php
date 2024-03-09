<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __(' Nouvelles Acquisitions') }}
        </h2>
    </x-slot>

    <div class="max-w-screen-lg p-4 mx-auto my-16 bg-gray-50">
        <form action="{{ route('materiel.materiel_acquisition.store') }}" method="post" class="flex flex-col gap-4">
            @csrf
            <div class="grid items-center gap-4 md:grid-cols-2">
                <div class="mt-4">
                    <x-input-label for="destination" :value="__('Pour ?')" />
                    <select name="destination"
                        class="w-full rounded-md shadow-sm border-primary-300 focus:border-primary focus:ring-primary">
                        <option disabled value="">Selectionner la destination du materiel</option>
                        <option value="informatique">Departement Informatique</option>
                        <option value="laboratoire">Laboratoire</option>
                    </select>
                    <x-input-error :messages="$errors->get('destination')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-input-label for="date_acquisition" :value="__('Date d\'Acquisition')" />
                    <input type="date" name="date_acquisition"
                        class="block w-full mt-1 rounded-md shadow-sm border-primary-300 focus:border-primary focus:ring-primary"
                        placeholder="Date d'Acquisition" />
                    <x-input-error :messages="$errors->get('date_acquisition')" class="mt-2" />
                </div>
            </div>
            <div>
                <h1>Les differentes acquisitions</h1>
            </div>

            <livewire:acquisition.acquisitons-lists />

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ms-3">
                    {{ __('Enregistrer') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>