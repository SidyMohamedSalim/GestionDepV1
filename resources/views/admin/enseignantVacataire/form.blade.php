<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Gestion Enseignant Vacataire') }}
        </h2>
    </x-slot>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="justify-center max-w-xl mx-auto">

        <form method="POST"
            action="{{ $enseignant->id ? route('vacataire.update', $enseignant) : route('vacataire.store') }}">
            @csrf

            @method($enseignant->id ? 'PUT' : 'POST')

            {{-- Nom --}}
            <div class="mt-4">
                <x-input-label for="nom" :value="__('Nom')" />

                <x-text-input id="nom" class="block w-full mt-1" type="nom" type='text' name="nom" autocomplete="nom"
                    value="{{ old('nom', $enseignant?->nom) }}" />
                <x-input-error :messages="$errors->get('nom')" class="mt-2" />
            </div>

            {{-- Prennom --}}

            <div class="mt-4">
                <x-input-label for="prenom" :value="__('Prenom')" />

                <x-text-input id="prenom" class="block w-full mt-1" type="prenom" name="prenom" autocomplete="prenom"
                    type='text' value="{{ old('prenom', $enseignant?->prenom) }}" />

                <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block w-full mt-1" type="email" name="email" type='email' autofocus
                    autocomplete="username" value="{{ old('email', $enseignant?->email) }}" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>



            <div class="mt-4">
                <x-input-label for="date_debut" :value="__('Date de Debut')" />
                <x-text-input id="date_debut" class="block w-full mt-1" type="date" name="date_debut"
                    value="{{ old('date_debut', $enseignant?->date_debut) }}" autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('date_debut')" class="mt-2" />
            </div>


            <div class="mt-4">
                <x-input-label for="date_fin" :value="__('Date de Fin')" />
                <x-text-input id="date_fin" class="block w-full mt-1" type="date" name="date_fin"
                    value="{{ old('date_fin', $enseignant?->date_fin) }}" autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('date_fin')" class="mt-2" />
            </div>



            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="active" class="inline-flex items-center">
                    <input type="hidden" name="active" value="0">
                    <input @checked(old('active', $enseignant->active)) id="active" type="checkbox" value="1"
                    class="text-indigo-600 border-gray-300 rounded shadow-sm focus:ring-indigo-500" name="active">
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
