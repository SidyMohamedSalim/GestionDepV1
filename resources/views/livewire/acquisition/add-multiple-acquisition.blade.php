<form wire:submit.prevent='saveAcquisitions()' method="" class="flex flex-col gap-4 p-8">
    @csrf
    <div class="grid items-center gap-4 md:grid-cols-2">
        <div class="mt-4">
            <x-input-label for="destination" :value="__('Pour ?')" />
            <select wire:model='destination'
                class="w-full rounded-md shadow-sm border-primary-300 focus:border-primary focus:ring-primary">
                <option disabled value="">Selectionner la destination du materiel</option>
                <option value="informatique">Departement Informatique</option>
                <option value="laboratoire">Laboratoire</option>
            </select>
            <x-input-error :messages="$errors->get('destination')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="date_acquisition" :value="__('Date d\'Acquisition')" />
            <input type="date" wire:model="date_acquisition"
                class="block w-full mt-1 rounded-md shadow-sm border-primary-300 focus:border-primary focus:ring-primary"
                placeholder="Date d'Acquisition" />
            <x-input-error :messages="$errors->get('date_acquisition')" class="mt-2" />
        </div>
    </div>

    <div>
        <div>
            <h1 class="py-4 text-xl font-extrabold">Les differentes acquisitions</h1>
            <x-input-error :messages="$errors->get('acquisition')" class="mt-2" />
        </div>
        @for ($i = 1; $i <= $nombre_acquisitions ; $i++) <div
            class="grid grid-cols-2 gap-3 p-4 my-2 bg-white rounded-lg shadow-sm">
            <p class="col-span-2 my-2 text-sm font-bold">Materiel {{ $i }}</p>
            <div>

                <select wire:model="acquisition.{{ $i }}.materiel_id"
                    class="w-full rounded-md shadow-sm border-primary-300 focus:border-primary focus:ring-primary">
                    <option disabled selected value="">Selectionner materiel</option>
                    @foreach ($materiels as $materiel)
                    <option value="{{ $materiel->id }}">{{ $materiel->designation }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('acquisition.'.$i.'.materiel_id')" class="mt-2" />
            </div>
            <div>
                <input min="1" type="number" wire:model="acquisition.{{ $i }}.quantite"
                    class="block w-full mt-1 rounded-md shadow-sm border-primary-300 focus:border-primary focus:ring-primary"
                    placeholder="Quantite" />
                <x-input-error :messages="$errors->get('acquisition.'.$i.'.quantite')" class="mt-2" />
            </div>
            <div class="col-span-2">
                <textarea wire:model="acquisition.{{ $i }}.carateristiques"
                    class="w-full rounded-md shadow-sm border-primary-300 focus:border-primary focus:ring-primary"
                    placeholder="commentaire"></textarea>
            </div>
    </div>
    @endfor

    <div class="flex justify-end gap-4 my-6">
        <button wire:click.prevent='decrement' @if ($nombre_acquisitions==1) disabled @endif
            class="'inline-flex items-center px-4 py-2 text-xs font-extrabold tracking-widest uppercase duration-150 ease-in-out bg-white border rounded-md shadow-sm transpition bg-wthite hover:border-primary focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 disabled:opacity-25">-</button>
        <button wire:click.prevent='increment'
            class="'inline-flex items-center px-4 py-2 text-xs font-extrabold tracking-widest uppercase duration-150 ease-in-out bg-white border rounded-md shadow-sm transpition bg-wthite hover:border-primary focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 disabled:opacity-25">+</button>
    </div>

    <div class="flex items-center justify-end mt-4">
        <x-primary-button class="ms-3">
            {{ __('Enregistrer') }}
        </x-primary-button>
    </div>
</form>