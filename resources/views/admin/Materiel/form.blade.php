<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Gestion Materiel') }}
        </h2>
    </x-slot>

    <div>
        <div class="justify-center max-w-xl mx-auto">


            <form method="post"
                action="{{$materiel->id ? route('materiel.materiel.update',$materiel) : route('materiel.materiel.store') }}">
                @csrf

                @method($materiel->id ? 'PUT' : 'POST')
                {{-- Nom --}}
                <div class="grid grid-cols-2 gap-4">
                    <div class="mt-4">
                        <x-input-label for="type" :value="__('Categorie de ?')" />
                        @if ($materiel->id)
                        <input type="text" name="categorie" value="{{ $materiel->categorie }}" class="hidden" />
                        @endif
                        <select name="categorie" @disabled($materiel->id)
                            class="w-full rounded-md shadow-sm border-primary-300 focus:border-primary
                            focus:ring-primary">
                            <option value="Equipement" @selected($materiel->categorie == 'Equipement')>Equipement ou
                                Materiel
                            </option>
                            <option value="Fourniture" @selected($materiel->type == 'Fourniture')>Fourniture
                            </option>
                        </select>

                        <x-input-error :messages="$errors->get('type')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="type" :value="__('Materiel de ?')" />
                        @if ($materiel->id)
                        <input type="text" name="type" value="{{ $materiel->type }}" class="hidden" />
                        @endif
                        <select name="type" @disabled($materiel->id)
                            class="w-full rounded-md shadow-sm border-primary-300 focus:border-primary
                            focus:ring-primary">
                            <option value="Bureau" @selected($materiel->type == 'Bureau')>Bureautique</option>
                            <option value="Informatique" @selected($materiel->type == 'Informatique')>Informatique
                            </option>
                        </select>

                        <x-input-error :messages="$errors->get('type')" class="mt-2" />
                    </div>
                </div>



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