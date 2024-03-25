<div class="p-2">

    <h1 class="py-6 text-xl text-center">Affection de materiel au bureau <span class="font-extrabold">{{
            $bureau->designation }} </h1>
    <div class="flex flex-col gap-4 p-6 border-b odd:bg-white">

        {{-- mteriel acquisition --}}
        <div class="mt-4">
            <x-input-label for="acquistionIdSelected" :value="__('Selectionner une Acquisition ?')" />

            <select name="type" wire:model.live.defer='acquistionIdSelected'
                class="w-full rounded-md shadow-sm border-primary-300 focus:border-primary focus:ring-primary">
                <option value="" disabled selected>
                    Selectionner une acquisition
                </option>
                @foreach ($acquisitions as $acquisition )
                <option value="{{ $acquisition->id }}">
                    <p>Designation : {{ $acquisition->materiel->designation }}</p>
                    <p class="mx-16">Quantite: {{ $acquisition->quantite }}</p>
                </option>
                @endforeach

            </select>
            <x-input-error :messages="$errors->get('acquistionIdSelected')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="quantite" :value="__('Quantité')" />

            <x-text-input wire:model.defer='quantite' id="quantite" class="block w-full mt-1 bg-gray-200" type='number'
                value="1" disabled name=" quantite" autocomplete="quantite" value="{{ old('quantite') }}" />

            <x-input-error :messages="$errors->get('quantite')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button wire:click.prevent='saveAcquisition()' class="ms-3 w-fit">
                {{ __('Affecter') }}
            </x-primary-button>
        </div>

    </div>
</div>