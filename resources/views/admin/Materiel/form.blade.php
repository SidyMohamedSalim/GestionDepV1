<x-app-layout>
    <div x-data="{ type: 'Equipement' }">
        <div class="justify-center max-w-xl mx-auto">


            @php

            @endphp
            <div>
                <h1 class="my-5 text-xl font-bold">Gestion Materiel</h1>
            </div>

            <form method="post" action="{{$materiel->id ? route($categorie =='Equipement' ? "
                materiel.equipement.update" : "materiel.fourniture.update" , $materiel) : route($categorie=='Equipement'
                ? "materiel.equipement.store" : "materiel.fourniture.store" )}}">
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

                </div>
                @endif


                <div class="mt-4">
                    <x-input-label for="type" :value="__('Materiel de ?')" />

                    <select name="type" @disabled($materiel->type)
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
                        <x-input-label for="materiel_id" :value="__(' Designation')" />
                        <select name="materiel_id"
                            class="w-full rounded-md shadow-sm border-primary-300 focus:border-primary focus:ring-primary">
                            @foreach ($designations as $designation)
                            <option @selected($designation->id == $materiel?->materiel?->id) value="{{
                                $designation->id
                                }}">{{ $designation->designation }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('materiel_id')" class="mt-2" />
                        <livewire:materiel.conditionnal-input-livewire name="designation_id" label="Designation" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="reference_id" :value="__('Reference')" />
                        <select name="reference_id"
                            class="w-full rounded-md shadow-sm border-primary-300 focus:border-primary focus:ring-primary">
                            @foreach ($references as $reference)
                            <option @selected($reference->id == $materiel?->reference?->id) value="{{ $reference->id
                                }}">{{ $reference->title }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('reference_id')" class="mt-2" />
                        <livewire:materiel.conditionnal-input-livewire name="reference" label="Reference" />
                    </div>

                </div>

                <div class="mt-4">
                    <x-input-label for="commentaire" :value="__('Commentaire')" />

                    <textarea name="commentaire"
                        class="w-full rounded-md shadow-sm border-primary-300 focus:border-primary focus:ring-primary">{{ old('commentaire', $materiel->commentaire) }}</textarea>

                    <x-input-error :messages="$errors->get('commentaire')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="date_acquisition" :value="__('Date Acquisition')" />
                    <x-text-input id="date_acquisition" class="block w-full mt-1" type="date" name="date_acquisition"
                        value="{{ old('date_acquisition', $materiel->date_acquisition) }}" autofocus
                        autocomplete="username" />
                    <x-input-error :messages="$errors->get('date_acquisition')" class="mt-2" />
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
