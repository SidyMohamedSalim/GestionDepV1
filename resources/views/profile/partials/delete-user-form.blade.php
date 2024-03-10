<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Une fois votre compte supprimé, toutes ses ressources et données seront définitivement supprimées.
            Avant
            en supprimant votre compte, veuillez télécharger toutes les données ou informations que vous souhaitez
            conserver') }}
        </p>
    </header>





    <x-modal-alpine title="Suppression" :key="Auth::user()->id " name="suppression de {{ Auth::user()->id }}">
        <x-slot name="icon">
            <p class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out border border-transparent rounded-md bg-danger hover:bg-danger active:bg-danger focus:outline-none focus:ring-2 focus:ring-danger focus:ring-offset-2"
                x-data="">{{
                __('Supprimer le Compte') }}</p>
        </x-slot>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Une fois votre compte supprimé, toutes ses ressources et données seront définitivement
                supprimées.
                Avant
                en supprimant votre compte, veuillez télécharger toutes les données ou informations que vous souhaitez
                conserver') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input id="password" name="password" type="password" class="block w-3/4 mt-1"
                    placeholder="{{ __('Password') }}" />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="flex justify-end mt-6">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Supprimer le Compte') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal-alpine>
</section>