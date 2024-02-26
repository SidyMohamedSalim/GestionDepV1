<tr class=" bg-gray-50">
    <td colspan="6">
        <form action="" class="p-8" wire:submit.prevent="saveAcquisiton">

            <div @class(["grid gap-4 md:grid-cols-2", "md:grid-cols-3"=> $materiel->categorie =="Fourniture"]) >
                <div class="mt-4">
                    <x-input-label for="destination" :value="__('Pour ?')" />
                    <select wire:model.defer="destination"
                        class="w-full rounded-md shadow-sm border-primary-300 focus:border-primary focus:ring-primary">
                        <option disabled value="">Selectionner la destination du materiel</option>
                        <option value="informatique">Departement Informatique</option>
                        <option value="laboratoire">Laboratoire</option>
                    </select>
                    <x-input-error :messages="$errors->get('destination')" class="mt-2" />
                </div>


                @if ($materiel->categorie == 'Equipement')
                <div class="mt-4">
                    <x-input-label for="numero_inventaire" :value="__('Numero d\'inventaire')" />
                    <input type="text" wire:model.defer="numero_inventaire"
                        class="block w-full mt-1 rounded-md shadow-sm border-primary-300 focus:border-primary focus:ring-primary"
                        placeholder="Numero d'inventaire" />
                    <x-input-error :messages="$errors->get('numero_inventaire')" class="mt-2" />
                </div>
                @endif

                <div class="mt-4">
                    <x-input-label for="quantite" :value="__(' Quantite')" />
                    <input type="number" wire:model.defer="quantite"
                        class="block w-full mt-1 rounded-md shadow-sm border-primary-300 focus:border-primary focus:ring-primary"
                        placeholder="Quantite" />
                    <x-input-error :messages="$errors->get('quantite')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-input-label for="date_acquisition" :value="__('Date d\'Acquisition')" />
                    <input type="date" wire:model.defer="date_acquisition"
                        class="block w-full mt-1 rounded-md shadow-sm border-primary-300 focus:border-primary focus:ring-primary"
                        placeholder="Date d'Acquisition" />
                    <x-input-error :messages="$errors->get('date_acquisition')" class="mt-2" />
                </div>
            </div>
            <div class="mt-4">
                <x-input-label for="carateristiques" :value="__('Caracteristiques')" />
                <textarea name="carateristiques" wire:model.defer='carateristiques'
                    class="w-full rounded-md shadow-sm border-primary-300 focus:border-primary focus:ring-primary"></textarea>
                <x-input-error :messages="$errors->get('caracteristiques')" class="mt-2" />
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-primary-button type='submit' class="ms-3" wire:loading.attr='disabled'>
                    {{ __('Enregistrer') }}
                </x-primary-button>
            </div>
        </form>
    </td>
</tr>