<x-app-layout>


    <!-- Session Status -->


    <div class="justify-center max-w-xl mx-auto">

        <div>
            <h1 class="my-5 text-xl font-bold">Gestion Enseignant</h1>
        </div>

        <form method="POST"
            action="{{ $enseignant->id ? route('enseignant.update', $enseignant) : route('enseignant.store') }}">
            @csrf

            @method($enseignant->id ? 'PUT' : 'POST')

            {{-- Nom --}}

            <div class="mt-4">
                <x-input-label for="nom" :value="__('Nom')" />

                <x-text-input id="nom" class="block w-full mt-1" type="nom" type='text' name="nom"
                    autocomplete="nom" value="{{ old('nom', $enseignant?->nom) }}" />

                <x-input-error :messages="$errors->get('nom')" class="mt-2" />
            </div>



            {{-- Prennom --}}

            <div class="mt-4">
                <x-input-label for="prenom" :value="__('Prenom')" />

                <x-text-input id="prenom" class="block w-full mt-1" type="prenom" name="prenom"
                    autocomplete="prenom" type='text' value="{{ old('prenom', $enseignant?->prenom) }}" />

                <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block w-full mt-1" type="email" name="email" type='email'
                    autofocus autocomplete="username" value="{{ old('email', $enseignant?->email) }}" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>



            <div class="mt-4">
                <x-input-label for="daterecrutement" :value="__('Date de Recrutement')" />
                <x-text-input id="daterecrutement" class="block w-full mt-1" type="date" name="daterecrutement"
                    value="{{ old('daterecrutement', $enseignant?->daterecrutement) }}" autofocus
                    autocomplete="username" />
                <x-input-error :messages="$errors->get('daterecrutement')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="grade" :value="__('Grade')" />
                <select name="grade" id="grade"
                    class="border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring-primary">
                    <option>Selectionner une grade</option>
                    <option @selected($enseignant->grade == 'MCH') value="MCH">MCH</option>
                    <option @selected($enseignant->grade == 'MC') value="MC">MC</option>
                    <option @selected($enseignant->grade == 'PES') value="PES">PES</option>
                </select>
                <x-input-error :messages="$errors->get('grade')" class="mt-2" />
            </div>



            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="active" class="inline-flex items-center">
                    <input type="hidden" name="active" value="0">
                    <input @checked(old('active', $enseignant?->active)) id="active" type="checkbox" value="1"
                        class="border-gray-300 rounded shadow-sm text-primary focus:ring-primary" name="active">
                    <span class="text-sm text-gray-600 ms-2">{{ __('Active') }}</span>
                    <x-input-error :messages="$errors->get('active')" class="mt-2" />
                </label>
            </div>



            <div class="flex items-center justify-end mt-4">


                <x-primary-button class="ms-3">
                    {{ __('Enregistrer') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
