<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Gestion Materiel') }}
        </h2>
    </x-slot>

    <div x-data="{ categorie: 'Equipement' }">
        <div class="justify-center max-w-xl mx-auto">


            <form method="post"
                action="{{$materiel->id ? route($categorie =='Equipement' ? 'materiel.equipement.update' : 'materiel.fourniture.update' , $materiel) : route($categorie=='Equipement' ? 'materiel.equipement.store' : 'materiel.fourniture.store' )}}">
                @csrf

                @method($materiel->id ? 'PUT' : 'POST')

                {{-- Nom --}}
                @if (!$materiel->id)
                <div class="grid grid-cols-2 gap-4 mt-4">
                    <a wire:navigate href="{{  route('materiel.equipement.create')  }}" @class(['inline-flex
                        items-center px-4 py-2 text-xs font-semibold tracking-widest uppercase duration-150 ease-in-out
                        border rounded-md shadow-sm transpition text-primary hover:border-primary focus:outline-none
                        focus:ring-2 focus:ring-primary focus:ring-offset-2
                        disabled:opacity-25', "bg-primary text-white"=> $categorie == 'Equipement'
                        ])>
                        +Equipement
                    </a>
                    <a wire:navigate href="{{ route('materiel.fourniture.create') }}" @class(['inline-flex items-center
                        px-4 py-2 text-xs font-semibold tracking-widest uppercase duration-150 ease-in-out border
                        rounded-md shadow-sm transpition text-primary hover:border-primary focus:outline-none
                        focus:ring-2 focus:ring-primary focus:ring-offset-2
                        disabled:opacity-25', "bg-primary text-white"=> $categorie ==
                        'Fourniture'
                        ])>
                        + Fourniture
                    </a>
                    <input type="text" id="categorie" name="categorie" value="{{ $categorie }}" class="hidden" />
                </div>
                @else
                <input type="text" id="categorie" name="categorie" value="{{ $materiel->categorie }}" class="hidden" />
                @endif


                <div class="mt-4">
                    <x-input-label for="type" :value="__('Materiel de ?')" />
                    @if ($materiel->id)
                    <input type="text" name="type" value="{{ $materiel->type }}" class="hidden" />
                    @endif
                    <select name="type" @disabled($materiel->id)
                        class="w-full rounded-md shadow-sm border-primary-300 focus:border-primary focus:ring-primary">
                        <option value="Bureau" @selected($materiel->type == 'Bureau')>Bureautique</option>
                        <option value="Informatique" @selected($materiel->type == 'Informatique')>Informatique
                        </option>
                    </select>

                    <x-input-error :messages="$errors->get('type')" class="mt-2" />
                </div>


                @if ($categorie == 'Equipement')
                <div class="mt-4">
                    <x-input-label for="numero_inventaire" :value="__('Numero Inventaire')" />

                    <x-text-input id="numero_inventaire" class="block w-full mt-1" type="text" name="numero_inventaire"
                        autocomplete="numero_inventaire"
                        value="{{ old('numero_inventaire', $materiel->numero_inventaire) }}" />

                    <x-input-error :messages="$errors->get('numero_inventaire')" class="mt-2" />
                </div>
                @endif

                <div class="grid grid-cols-2 gap-4">

                    <div class="mt-4">
                        <x-input-label for="designation" :value="__('Designation')" />

                        <x-text-input id="designation" class="block w-full mt-1" type="text" name="designation"
                            autocomplete="designation" value="{{ old('designation', $materiel->designation) }}" />

                        <x-input-error :messages="$errors->get('designation')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="reference" :value="__('Reference')" />

                        <x-text-input id="reference" class="block w-full mt-1" type="text" name="reference"
                            autocomplete="reference" value="{{ old('reference', $materiel->reference) }}" />

                        <x-input-error :messages="$errors->get('reference')" class="mt-2" />
                    </div>

                </div>

                <div class="mt-4">
                    <x-input-label for="commentaire" :value="__('Commentaire')" />

                    <textarea name="commentaire"
                        class="w-full rounded-md shadow-sm border-primary-300 focus:border-primary focus:ring-primary">{{ old('commentaire', $materiel->commentaire) }}</textarea>

                    <x-input-error :messages="$errors->get('commentaire')" class="mt-2" />
                </div>


                <div class="flex items-center justify-end mt-4">
                    <x-primary-button type='submit' class="ms-3">
                        {{ __('Enregistrer') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>