<tr class=" bg-gray-50">
    <td colspan="5">
        <form action="" class="p-8" wire:submit.prevent="saveAcquisiton">
            <div class="grid grid-cols-2 gap-4 ">
                <div class="mt-4">
                    <x-input-label for="quantite" :value="__(' Quantite')" />
                    <input type="text" wire:model.defer="quantite"
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
            <div class="flex items-center justify-end mt-4">
                <x-primary-button type='submit' class="ms-3" wire:loading.attr='disabled'>
                    {{ __('Enregistrer') }}
                </x-primary-button>
            </div>
        </form>
    </td>
</tr>