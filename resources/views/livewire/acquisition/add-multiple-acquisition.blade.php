<div class="p-8">

    @php
    $estInventorie = $categorie == 'Equipement';
    @endphp
    <div class="grid justify-between grid-cols-2 gap-2 text-md-center">
        <button wire:click='changeCategorieToFourniture' @class([ "'inline-flex items-center px-4 py-2 text-xs
                                            font-extrabold tracking-widest uppercase duration-150 ease-in-out rounded-md shadow-sm transpition bg-wthite
                                            hover:border-primary focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2
                                            disabled:opacity-25" , 'bg-primary text-white'=> $categorie ==
            'Fourniture',
            ])>Materiels
            Non
            Inventoriés
        </button>

        <button wire:click='changeCategorieToEquipement' @class([ "'inline-flex items-center px-4 py-2 text-xs
                                            font-extrabold tracking-widest uppercase duration-150 ease-in-out rounded-md shadow-sm transpition bg-wthite
                                            hover:border-primary focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2
                                            disabled:opacity-25" , 'bg-primary text-white'=> $categorie ==
            'Equipement',
            ])>Materiels
            Inventoriés
        </button>
    </div>

    <form wire:submit.prevent='saveAcquisitions()' class="flex flex-col gap-4">
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
            @for ($i = 1; $i <= $nombre_acquisitions; $i++) <div class="p-4 my-2 bg-white rounded-lg shadow-sm ">
                <p class="my-2 text-sm font-bold ">Materiel {{ $i }}</p>
                <div @class([ 'grid items-start grid-cols-2 gap-3 my-4 ' , 'grid-cols-3'=>$estInventorie,
                    ])>
                    <div>
                        <select wire:model="{{ 'acquisition.' . $i . '.materiel_id'}}"
                            class="w-full rounded-md shadow-sm border-primary-300 focus:border-primary focus:ring-primary">
                            <option @selected(true) value="">Selectionner materiel</option>
                            @foreach ($materiels as $materiel)
                            <option value="{{ $materiel->id }}">
                                {{ $materiel->designation }} {{$materiel->reference }}
                            </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('acquisition.' . $i . '.materiel_id')" class="mt-2" />
                    </div>

                    @if ($estInventorie)
                    <div>
                        <input type="text" wire:model="acquisition.{{ $i }}.numero_inventaire"
                            class="block w-full rounded-md shadow-sm border-primary-300 focus:border-primary focus:ring-primary"
                            placeholder="Numero d'inventaire" />
                        <x-input-error :messages="$errors->get('acquisition.' . $i . '.numero_inventaire')"
                            class="mt-2" />
                    </div>
                    @endif
                    <div>
                        @if ($estInventorie)
                        <p class="flex items-center justify-center "><span class="">Quantité
                                :</span><span class="text-xl font-extrabold">1</span>
                        </p>
                        @else
                        <input min="1" type="number" wire:model="acquisition.{{ $i }}.quantite" defaultValue="1"
                            class="block w-full rounded-md shadow-sm border-primary-300 focus:border-primary focus:ring-primary"
                            placeholder="Quantite" />
                        <x-input-error :messages="$errors->get('acquisition.' . $i . '.quantite')" class="mt-2" />
                        @endif
                    </div>
                </div>

                <div>
                    <textarea wire:model="acquisition.{{ $i }}.carateristiques"
                        class="w-full rounded-md shadow-sm border-primary-300 focus:border-primary focus:ring-primary"
                        placeholder="commentaire"></textarea>
                </div>
        </div>
        @endfor

        <div class="flex justify-end gap-4 my-6 text-white">
            <button wire:click.prevent='decrement' @if ($nombre_acquisitions==1) disabled @endif
                class="'inline-flex items-center px-4 py-2 text-xs font-extrabold tracking-widest uppercase duration-150 ease-in-out bg-secondary border rounded-md shadow-sm transpition bg-wthite hover:border-primary focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 disabled:opacity-25">-Moins</button>
            <button wire:click.prevent='increment'
                class="'inline-flex items-center px-4 py-2 text-xs font-extrabold tracking-widest uppercase duration-150 ease-in-out bg-secondary border rounded-md shadow-sm transpition bg-wthite hover:border-primary focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 disabled:opacity-25">+Plus</button>
        </div>

        <div class="flex items-center justify-end mt-6">
            <x-primary-button class="ms-3">
                {{ __('Enregistrer les acquisitions') }}
            </x-primary-button>
        </div>
    </form>
</div>
