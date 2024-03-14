<div class="p-2">

    <h1 class="py-6 text-xl text-center">Affection de materiel
        {{-- <span class="font-extrabold">{{
            $acquisition->mte }} {{
            $enseignant->prenom
            }}</span> Avec
        l'email <span class="font-extrabold">{{$enseignant->email }}</span> --}}

    </h1>
    <div class="flex flex-col gap-4 p-6 border-b odd:bg-white">

        {{-- mteriel acquisition --}}
        <div class="mt-4">
            <x-input-label for="type" :value="__('Selectionner une Acquisition ?')" />

            <select name="enseignanIdSelected" wire:model.live.defer='enseignanIdSelected'
                class="w-full rounded-md shadow-sm border-primary-300 focus:border-primary focus:ring-primary">
                <option value="" disabled selected>
                    Selectionner un enseignant
                </option>
                @foreach ($enseignants as $enseignant )
                <option value="{{ $enseignant->id }}">
                    <p>Nom : {{ $enseignant->nom }}</p>
                    <p class="mx-16">Email: {{ $enseignant->email }}</p>
                </option>
                @endforeach

            </select>
            <x-input-error :messages="$errors->get('enseignanIdSelected')" class="mt-2" />
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