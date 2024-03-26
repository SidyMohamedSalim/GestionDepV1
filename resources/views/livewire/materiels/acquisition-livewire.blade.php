<div class=" bg-gray-50">
    <div colspan="6">
        <form action="" class="p-8" wire:submit.prevent="saveAcquisiton">

            @php
            $estInventorie = $materiel->categorie == 'Equipement';
            @endphp



            <div @class(["grid gap-4 md:grid-cols-2 items-end", "md:grid-cols-3  items-end "=> $materiel->categorie
                =="Fourniture"])
                >
                <div class="mt-4">
                    <x-input-label for="destination" :value="__('Pour ?')" />
                    <select wire:model="destination"
                        class="w-full rounded-md shadow-sm border-primary-300 focus:border-primaryfocus:ring-primary">
                        <option disabled value="">Selectionner la destination du materiel</option>
                        <option value="informatique">Departement Informatique</option>
                        <option value="laboratoire">Laboratoire</option>
                    </select>
                    <x-input-error :messages="$errors->get('destination')" class="mt-2" />
                </div>

                @if ($estInventorie)
                <div class="mt-4">
                    <x-input-label for="numero_inventaire" :value="__('Numero d\'inventaire')" />
                    <input type="text" wire:model="numero_inventaire"
                        class="block w-full mt-1 rounded-md shadow-sm border-primary-300 focus:border-primary focus:ring-primary"
                        placeholder="Numero d'inventaire" />
                    <x-input-error :messages="$errors->get('numero_inventaire')" class="mt-2" />
                </div>
                @endif

                <div class="mt-4">
                    <x-input-label for="quantite" :value="__(' Quantité')" />
                    @if ($estInventorie)
                    <p class="flex flex-col text-sm text-blue-500">
                        Nouvelle acquisition d'un materiel inventorié
                    </p>
                    @endif

                    @if ($estInventorie == true)
                    <input @disabled(true) type="number" wire:model="quantite"
                        class="block w-full mt-1 rounded-md shadow-sm border-primary-300 focus:border-primary focus:ring-primary"
                        placeholder="Quantite" />
                    @else

                    <input type="number" wire:model="quantite"
                        class="block w-full mt-1 rounded-md shadow-sm border-primary-300 focus:border-primary focus:ring-primary"
                        placeholder="Quantite" />
                    @endif

                    <x-input-error :messages="$errors->get('quantite')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-input-label for="date_acquisition" :value="__('Date d\'Acquisition')" />
                    <input type="date" wire:model="date_acquisition"
                        class="block w-full mt-1 rounded-md shadow-sm border-primary-300 focus:border-primary focus:ring-primary"
                        placeholder="Date d'Acquisition" />
                    <x-input-error :messages="$errors->get('date_acquisition')" class="mt-2" />
                </div>
            </div>
            <div class="mt-4">
                <x-input-label for="carateristiques" :value="__('Caracteristiques')" />
                <textarea name="carateristiques" wire:model='carateristiques'
                    class="w-full rounded-md shadow-sm border-primary-300 focus:border-primary focus:ring-primary"></textarea>
                <x-input-error :messages="$errors->get('caracteristiques')" class="mt-2" />
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-primary-button type='submit' class="ms-3" wire:loading.attr='disabled'>
                    {{ __('Enregistrer') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</div>