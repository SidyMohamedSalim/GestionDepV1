<x-app-layout>


    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Gestion Bureau') }}
        </h2>
    </x-slot>


    <div class="justify-center max-w-xl mx-auto">



        <form method="POST" action="{{ $bureau->id ? route('bureau.update', $bureau) : route('bureau.store') }}">
            @csrf

            @method($bureau->id ? 'PUT' : 'POST')

            {{-- Nom --}}

            <div class="mt-4">
                <x-input-label for="numero_bureau" :value="__('Numero Bureau')" />

                <x-text-input id="numero_bureau" class="block w-full mt-1" type='text' name="numero_bureau"
                    autocomplete="numero_bureau" value="{{ old('numero_bureau', $bureau?->numero_bureau) }}" />

                <x-input-error :messages="$errors->get('numero_bureau')" class="mt-2" />
            </div>



            <div class="mt-4">
                <x-input-label for="designation" :value="__('Designation')" />

                <x-text-input id="designation" class="block w-full mt-1" type='text' name="designation"
                    autocomplete="designation" value="{{ old('designation', $bureau?->designation) }}" />

                <x-input-error :messages="$errors->get('designation')" class="mt-2" />
            </div>



            {{-- Prennom --}}

            <div class="mt-4">
                <x-input-label for="capacite" :value="__('Capacite')" />

                <x-text-input id="capacite" class="block w-full mt-1" type="number" name="capacite"
                    autocomplete="capacite" value="{{ old('capacite', $bureau?->capacite) }}" />

                <x-input-error :messages="$errors->get('capacite')" class="mt-2" />
            </div>



            <div class="mt-4">
                <x-input-label for="date_acquisition" :value="__('Date Acquisition')" />
                <x-text-input id="date_acquisition" class="block w-full mt-1" type="date" name="date_acquisition"
                    value="{{ old('date_acquisition', $bureau?->date_acquisition) }}" autofocus
                    autocomplete="username" />
                <x-input-error :messages="$errors->get('date_acquisition')" class="mt-2" />
            </div>



            <div class="flex items-center justify-end mt-4">


                <x-primary-button class="ms-3">
                    {{ __('Enregistrer') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
