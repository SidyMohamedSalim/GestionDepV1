<x-modal-alpine title="Affectation d'un materiel" :key="$enseignant->id" name="materiel de {{ $enseignant->id }}">
    <x-slot name="icon">
        <x-icons.utils />
    </x-slot>
    <div class="p-2">

        <h1 class="py-6 text-xl text-center">Affection de materiel a l'enseignant <span class="font-extrabold">{{
                $enseignant->nom }} {{
                $enseignant->prenom
                }}</span> Avec
            l'email <span class="font-extrabold">{{$enseignant->email }}</span></h1>
        <div class="flex flex-col gap-4 p-6 border-b odd:bg-white">

            {{-- materiel acquisition --}}

            <div class="grid grid-cols-2 gap-2 justify-between text-md-center">
                <button wire:click='changeCategorieToFourniture' @class([ "'inline-flex items-center px-4 py-2 text-xs
                                                            font-extrabold tracking-widest uppercase duration-150 ease-in-out rounded-md shadow-sm transpition bg-wthite
                                                            hover:border-primary focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2
                                                            disabled:opacity-25" , 'bg-primary text-white'=> $categorie
                    ==
                    'Fourniture',
                    ])>Materiels
                    Non
                    Inventoriés
                </button>

                <button wire:click='changeCategorieToEquipement' @class([ "'inline-flex items-center px-4 py-2 text-xs
                                                            font-extrabold tracking-widest uppercase duration-150 ease-in-out rounded-md shadow-sm transpition bg-wthite
                                                            hover:border-primary focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2
                                                            disabled:opacity-25" , 'bg-primary text-white'=> $categorie
                    ==
                    'Equipement',
                    ])>Materiels
                    Inventoriés
                </button>
            </div>

            <div class="mt-4">
                <x-input-label for="acquistionIdSelected" :value="__('Selectionner une Acquisition ?')" />

                @php
                $acquisitions =$categorie == 'Equipement' ? $acquisitions : $fournitruesacquistions;
                @endphp


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

                <x-text-input wire:model.defer='quantite' id="quantite" class="block mt-1 w-full" type='number'
                    name=" quantite" autocomplete="quantite" value="{{ old('quantite') }}" />

                <x-input-error :messages="$errors->get('quantite')" class="mt-2" />
            </div>


            <div class="flex justify-end items-center mt-4">
                <x-primary-button wire:click.prevent='saveAcquisition()' class="ms-3 w-fit">
                    {{ __('Affecter') }}
                </x-primary-button>
            </div>

        </div>
    </div>
</x-modal-alpine>
