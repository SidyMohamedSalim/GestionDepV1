<x-app-layout>
    <div x-data="{ type: 'Equipement' }">
        <div class="justify-center max-w-xl mx-auto">

            <div>
                <h1 class="my-5 text-xl font-bold">Gestion Materiel</h1>
            </div>

            <form method="POST"
                action="{{ $materiel->id ? route('materiel.store') : route('materiel.update', $materiel) }}">
                @csrf

                @method($materiel->id ? 'PUT' : 'POST')

                {{-- Nom --}}
                <div class="grid grid-cols-2 gap-4">

                    <div class="mt-4">
                        <x-input-label for="type" :value="__('Type')" />

                        <select x-model='type' name="categorie"
                            class="w-full rounded-md shadow-sm border-primary-300 focus:border-primary focus:ring-primary">
                            <option value="Equipement" @selected($materiel->categorie == 'Equipement')>Equipement</option>
                            <option value="Fourniture" @selected($materiel->categorie == 'Fourniture')>Fourniture</option>
                        </select>

                        <x-input-error :messages="$errors->get('categorie')" class="mt-2" />
                    </div>


                    <div class="mt-4">
                        <x-input-label for="type" :value="__('Materiel de ?')" />

                        <select name="type"
                            class="w-full rounded-md shadow-sm border-primary-300 focus:border-primary focus:ring-primary">
                            <option value="Bureau" @selected($materiel->type == 'Bureau')>Bureautique</option>
                            <option value="Informatique" @selected($materiel->type == 'Informatique')>Informatique</option>
                        </select>

                        <x-input-error :messages="$errors->get('type')" class="mt-2" />
                    </div>


                </div>

                <div class="mt-4" x-show="type=='Equipement'">
                    <x-input-label for="numero_inventaire" :value="__('Numero Inventaire')" />

                    <x-text-input id="numero_inventaire" class="block w-full mt-1" type="text"
                        name="numero_inventaire" autocomplete="numero_inventaire"
                        value="{{ old('numero_inventaire', $materiel->numero_inventaire) }}" />

                    <x-input-error :messages="$errors->get('numero_inventaire')" class="mt-2" />
                </div>


                <div class="grid grid-cols-2 gap-4">

                    <livewire:materiel.conditionnal-input-livewire name="designation_id" label="Designation"
                        @saved="$refresh" />
                    <livewire:materiel.conditionnal-input-livewire name="reference_id" label="Reference"
                        @saved="$refresh" />

                </div>

                <div class="mt-4">
                    <x-input-label for="commentaire" :value="__('Commentaire')" />

                    <textarea class="w-full rounded-md shadow-sm border-primary-300 focus:border-primary focus:ring-primary">{{ old('commentaire', $materiel->commentaire) }}</textarea>

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
                    <x-primary-button class="ms-3">
                        {{ __('Enregistrer') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
