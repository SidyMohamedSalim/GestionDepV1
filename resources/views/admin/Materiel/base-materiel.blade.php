<x-app-layout>


    <div class="max-w-screen-xl m-10 mx-auto">
        <div>
            <a href="{{ route('materiel.materiel_acquisition.index') }}"
                class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest uppercase transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 disabled:opacity-25'>
                Admin des acquisitions
            </a>
        </div>

        <x-success-message />

        @php
        $type = request()->input("type");
        $categorie = request()->input("categorie");
        @endphp

        <h1 class="mt-6 text-2xl font-extrabold">Gestion des materiels</h1>

        <div class="flex items-center justify-end my-4">
            <div>
                <a href="{{  route('materiel.materiel.create')  }}"
                    class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest uppercase duration-150 ease-in-out bg-white border rounded-md shadow-sm transpition text-primary hover:border-primary focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 disabled:opacity-25'>
                    +nouveau materiel
                </a>


            </div>
        </div>

        @yield('content')


    </div>

</x-app-layout>