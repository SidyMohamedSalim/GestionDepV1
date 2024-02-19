<x-app-layout>


    <div class="max-w-screen-xl m-10 mx-auto">
        <x-success-message />

        <div class="flex items-center justify-between my-4">
            <div> <a href="{{ route('enseignant.index') }}" wire:navigate
                    active="request() - > routeIs('enseignant.index')"
                    class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest @if (request()->routeIs('enseignant.index'))
text-white
bg-primary
@else
@endif uppercase transition duration-150 ease-in-out border border-transparent rounded-md hover:bg-primary focus:bg-primary active:bg-primary focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2'>
                    Enseignants Permanents
                </a>

                <a href="{{ route('vacataire.index') }}" wire:navigate active="request() - > routeIs('enseignant.index')"
                    class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest @if (request()->routeIs('vacataire.index'))
text-white
bg-primary
@else
@endif uppercase transition duration-150 ease-in-out border border-transparent rounded-md hover:bg-primary focus:bg-primary active:bg-primary focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2'>
                    Enseignants Vacataires
                </a>
            </div>

            <div>

                <a href="{{ request()->routeIs('enseignant.index') ? route('enseignant.create') : route('vacataire.create') }}"
                    class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest uppercase duration-150 ease-in-out bg-white border rounded-md shadow-sm transpition text-primary hover:border-primary focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 disabled:opacity-25'>
                    + Nouveau Enseignant
                </a>
            </div>
        </div>




        @yield('content')


    </div>

</x-app-layout>
