<x-app-layout>

    <div class="m-10 mx-auto max-w-screen-xl">
        <x-succes-message />

        <div class="flex justify-between items-center my-4">
            @php
            $routes = [
            'enseignant.index' => 'Enseignants Permanents',
            'vacataire.index' => 'Enseignants Vacataires',
            ];
            @endphp
            <div class="flex gap-2">
                @foreach ($routes as $route => $label)
                <x-jet-button :href="route($route)" :active="request()->routeIs($route)">
                    {{ $label }}
                </x-jet-button>

                @endforeach
            </div>

            <div>
                <x-ligth-button
                    :href="request()->routeIs('enseignant.index') ? route('enseignant.create') : route('vacataire.create')">
                    + Nouveau Enseignant
                </x-ligth-button>
            </div>
        </div>

        @yield('content')

    </div>

</x-app-layout>
