<x-app-layout>

    <div class="m-10 mx-auto max-w-screen-xl">
        <x-succes-message />

        <div class="flex justify-between items-center my-4">
            @php
            $routes = [
            'archives.affectation.index' => 'Historique des affectations',
            'archives.demande.index' => 'Mes demandes de materiels',
            ];
            @endphp
            <div class="flex gap-2">
                @foreach ($routes as $route => $label)
                <x-jet-button :href="route($route)" :active="request()->routeIs($route)">
                    {{ $label }}
                </x-jet-button>
                @endforeach
            </div>

            @yield('action-right')
        </div>

        @yield('content')

    </div>

</x-app-layout>
