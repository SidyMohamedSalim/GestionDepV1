<div x-data="{ type: 'equipement' }">
    <div class="justify-center max-w-xl mx-auto">

        <p x-text='type'></p>
        <div>
            <h1 class="my-5 text-xl font-bold">Gestion Materiel</h1>
        </div>

        <form method="POST">
            @csrf

            {{-- @method($bureau->id ? 'PUT' : 'POST') --}}

            {{-- Nom --}}
            <div class="grid grid-cols-2 gap-4">

                <div class="mt-4">
                    <x-input-label for="type" :value="__('Type')" />

                    <select x-model='type'
                        class="w-full rounded-md shadow-sm border-primary-300 focus:border-primary focus:ring-primary">
                        <option value="equipement">equipement</option>
                        <option value="fourniture">fourniture</option>
                    </select>

                    <x-input-error :messages="$errors->get('numero_bureau')" class="mt-2" />
                </div>


                <div class="mt-4">
                    <x-input-label for="numero_bureau" :value="__('Materiel de ?')" />

                    <select
                        class="w-full rounded-md shadow-sm border-primary-300 focus:border-primary focus:ring-primary">
                        <option>Bureau</option>
                        <option>Informatique</option>
                    </select>

                    <x-input-error :messages="$errors->get('numero_bureau')" class="mt-2" />
                </div>


            </div>

            <div class="mt-4" x-show="type=='equipement'">
                <x-input-label for="capacite" :value="__('Numero Inventaire')" />

                <x-text-input id="capacite" class="block w-full mt-1" type="text" name="inventaire"
                    autocomplete="capacite" value="{{ old('capacite') }}" />

                <x-input-error :messages="$errors->get('capacite')" class="mt-2" />
            </div>


            <div class="grid grid-cols-2 gap-4">

                <livewire:materiel.conditionnal-input-livewire name="designation_id" label="Designation"
                    @saved="$refresh" />
                <livewire:materiel.conditionnal-input-livewire name="reference_id" label="Reference"
                    @saved="$refresh" />

            </div>


            <div class="mt-4">
                <x-input-label for="commentaire" :value="__('Commentaire')" />

                <textarea class="w-full rounded-md shadow-sm border-primary-300 focus:border-primary focus:ring-primary">

                </textarea>

                <x-input-error :messages="$errors->get('numero_bureau')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="date_acquisition" :value="__('Date Acquisition')" />
                <x-text-input id="date_acquisition" class="block w-full mt-1" type="date" name="date_acquisition"
                    value="{{ old('date_acquisition') }}" autofocus autocomplete="username" />
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
