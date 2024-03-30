<div class="p-2">

    <h1 class="py-6 text-xl text-center">Ajouter un composant
        {{-- <span class="font-extrabold">{{
            $acquisition->mte }} {{
            $composant->prenom
            }}</span> Avec
        l'email <span class="font-extrabold">{{$composant->email }}</span> --}}

    </h1>
    <div class="flex flex-col gap-4 p-6 border-b odd:bg-white">

        {{-- mteriel acquisition --}}
        <div class="mt-4">
            <x-input-label for="type" :value="__('Selectionner un composant (materiel)')" />

            <select name="materielIdSelected" wire:model.live.defer='materielIdSelected'
                class="w-full rounded-md shadow-sm border-primary-300 focus:border-primary focus:ring-primary">
                <option value="" disabled selected>
                    Selectionner un composant
                </option>
                @foreach ($composants as $composant )
                <option value="{{ $composant->id }}">
                    <p class="mx-16"> {{ $composant->materiel->designation }} {{ $composant->materiel->reference }}</p>
                    <p>Quantite: {{ $composant->quantite }}</p>
                </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('materielIdSelected')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="quantite" :value="__('Quantité')" />


            <x-text-input wire:model.defer='quantite' id="quantite" class="block w-full mt-1"
                value="{{ old('quantite') }}" />

            <x-input-error :messages="$errors->get('quantite')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button wire:click.prevent='saveAcquisition()' class="ms-3 w-fit">
                {{ __('Affecter') }}
            </x-primary-button>
        </div>

    </div>
</div>