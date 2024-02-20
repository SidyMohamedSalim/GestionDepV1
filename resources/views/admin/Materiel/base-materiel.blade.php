<x-app-layout>


    <div class="max-w-screen-xl m-10 mx-auto">
        <x-success-message />

        @php
        $type = request()->input("type");
        $categorie = request()->input("categorie");
        @endphp

        <div class="flex items-center justify-between my-4">
            <div>
                <a href="{{ route('materiel.index') }}?type=Bureau&categorie=Fourniture" wire:navigate
                    active="request() - > routeIs('materiels.index')"
                    @class([ 'text-white
                                                                                                                        bg-primary'=> ($type == 'Bureau' && $categorie
                    == 'Fourniture' ) || ($type == '' && $categorie == ''),
                    'inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest uppercase transition
                    duration-150 ease-in-out border border-transparent rounded-md hover:bg-primary focus:bg-primary
                    active:bg-primary focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2',
                    ])>
                    Fourniture Bureau
                </a>

                <a href="{{ route('materiel.index') }}?type=Bureau&categorie=Equipement" wire:navigate
                    active="request() - > routeIs('enseignant.index')"
                    @class([ 'text-white
                                                                                                                bg-primary'=> ($type == 'Bureau'
                    && $categorie
                    == 'Equipement'),
                    'inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest uppercase transition
                    duration-150 ease-in-out border border-transparent rounded-md hover:bg-primary focus:bg-primary
                    active:bg-primary focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2',
                    ])>
                    Equipement Bureau
                </a>

                <a href="{{ route('materiel.index') }}?type=Informatique&categorie=Fourniture" wire:navigate
                    active="request() - > routeIs('enseignant.index')" @class([ 'text-white bg-primary'=> ($type ==
                    'Informatique' && $categorie
                    == 'Fourniture'),
                    'inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest uppercase
                    transition
                    duration-150 ease-in-out border border-transparent rounded-md hover:bg-primary
                    focus:bg-primary
                    active:bg-primary focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2',
                    ])>
                    Fourniture Informatique
                </a>
                <a href="{{ route('materiel.index') }}?type=Informatique&categorie=Equipement" wire:navigate
                    active="request() - > routeIs('enseignant.index')" @class([ 'text-white bg-primary'=> ($type ==
                    'Informatique' &&
                    $categorie
                    == 'Equipement'),
                    'inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest uppercase
                    transition
                    duration-150 ease-in-out border border-transparent rounded-md hover:bg-primary
                    focus:bg-primary
                    active:bg-primary focus:outline-none focus:ring-2 focus:ring-primary
                    focus:ring-offset-2',
                    ])>
                    Equipement Informatique
                </a>
            </div>

            <div>
                <a href="{{ request()->routeIs('materiel.create') ? route('') : route('materiel.create') }}"
                    class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest uppercase duration-150 ease-in-out bg-white border rounded-md shadow-sm transpition text-primary hover:border-primary focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 disabled:opacity-25'>
                    + Nouveau Materiel
                </a>
            </div>
        </div>




        @yield('content')


    </div>

</x-app-layout>
