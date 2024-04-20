<div class="py-8">



    <form wire:submit.prevent='saveDemande()' class="flex flex-col gap-4">
        @csrf
        <div class="grid gap-4 items-center md:grid-cols-2">
            <div class="mt-4">
                <x-input-label for="titre" :value="__('Titre')" />
                <input type="text" wire:model="titre"
                    class="block mt-1 w-full rounded-md shadow-sm border-primary-300 focus:border-primary focus:ring-primary"
                    placeholder="Titre de la demande" />
                <x-input-error :messages="$errors->get('titre')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="date_demande" :value="__('Date de Demande')" />
                <input type="date" wire:model="date_demande"
                    class="block mt-1 w-full rounded-md shadow-sm border-primary-300 focus:border-primary focus:ring-primary"
                    placeholder="Date d'demande" />
                <x-input-error :messages="$errors->get('date_demande')" class="mt-2" />
            </div>
        </div>

        <div>
            <div>
                <h1 class="py-4 text-xl font-extrabold">Les differents elements</h1>
                <x-input-error :messages="$errors->get('demande')" class="mt-2" />
            </div>
            @for ($i = 1; $i <= $nombre_demandes; $i++) <div class="p-4 my-2 bg-white rounded-lg shadow-sm">
                <p class="my-2 text-sm font-bold">Element {{ $i }}</p>
                {{-- designation --}}
                <div class="mt-4">
                    <x-input-label for="designation" :value="__('designation')" />
                    <input type="text" wire:model="demande.{{ $i }}.designation" defaultValue="1"
                        class="block w-full rounded-md shadow-sm border-primary-300 focus:border-primary focus:ring-primary"
                        placeholder="designation" />
                    <x-input-error :messages="$errors->get('demande.' . $i . '.designation')" class="mt-2" />
                </div>
                <div @class([ 'grid items-start grid-cols-2 gap-3 my-4 ' ])>
                    {{-- quantite --}}
                    <div>
                        <input min="1" type="number" wire:model="demande.{{ $i }}.quantite" defaultValue="1"
                            class="block w-full rounded-md shadow-sm border-primary-300 focus:border-primary focus:ring-primary"
                            placeholder="Quantite" />
                        <x-input-error :messages="$errors->get('demande.' . $i . '.quantite')" class="mt-2" />
                    </div>
                    {{-- prix unitaire --}}
                    <div>
                        <input min="1" type="number" wire:model="demande.{{ $i }}.prix_unitaire" defaultValue="1"
                            class="block w-full rounded-md shadow-sm border-primary-300 focus:border-primary focus:ring-primary"
                            placeholder="Prix unitaire (DH)" />
                        <x-input-error :messages="$errors->get('demande.' . $i . '.prix_unitaire')" class="mt-2" />
                    </div>
                </div>

                {{-- description --}}

                <div>
                    <textarea wire:model="demande.{{ $i }}.description"
                        class="w-full rounded-md shadow-sm border-primary-300 focus:border-primary focus:ring-primary"
                        placeholder="description"></textarea>
                    <x-input-error :messages="$errors->get('demande.' . $i . '.description')" class="mt-2" />
                </div>


        </div>

        @endfor

        <div class="flex gap-4 justify-end my-6 text-white">
            <button wire:click.prevent='decrement' @if ($nombre_demandes==1) disabled @endif
                class="'inline-flex items-center px-4 py-2 text-xs font-extrabold tracking-widest uppercase duration-150 ease-in-out bg-secondary border rounded-md shadow-sm transpition bg-wthite hover:border-primary focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 disabled:opacity-25">-Moins</button>
            <button wire:click.prevent='increment'
                class="'inline-flex items-center px-4 py-2 text-xs font-extrabold tracking-widest uppercase duration-150 ease-in-out bg-secondary border rounded-md shadow-sm transpition bg-wthite hover:border-primary focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 disabled:opacity-25">+Plus</button>
        </div>

        <div class="flex justify-end items-center mt-6">
            <x-primary-button class="ms-3">
                {{ __('Enregistrer la demande') }}
            </x-primary-button>
        </div>
    </form>
</div>
