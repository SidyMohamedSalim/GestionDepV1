<x-app-layout>
    <div class="m-10 mx-auto max-w-screen-xl">
        <div>
            <x-jet-button href="{{ route('materiel.equipement.index') }}">
                Admin des acquisitions
            </x-jet-button>
        </div>

        <x-succes-message />

        @php
        $type = request()->input("type");
        $categorie = request()->input("categorie");
        @endphp

        <h1 class="mt-6 text-2xl font-extrabold">Gestion des materiels</h1>

        <div class="flex justify-end gap-4 items-center my-4">
            <x-jet-button href="{{ route('materiel.materiel.create') }}">
                +nouveau materiel
            </x-jet-button>

        </div>

        @yield('content')
    </div>
</x-app-layout>
