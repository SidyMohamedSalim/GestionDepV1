<x-app-layout>


    <div class="max-w-screen-xl m-10 mx-auto">

        <div class="flex items-center justify-between my-4">
            <div> <a href="{{ route('enseignant.index') }}" wire:navigate
                    active="request() - > routeIs('enseignant.index')"
                    class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest @if (request()->routeIs('enseignant.index'))
text-white
bg-gray-800
@else
@endif uppercase transition duration-150 ease-in-out border border-transparent rounded-md hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2'>
                    Enseignants Permanents
                </a>

                <a href="{{ route('vacataire.index') }}" wire:navigate active="request() - > routeIs('enseignant.index')"
                    class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest @if (request()->routeIs('vacataire.index'))
text-white
bg-gray-800
@else
@endif uppercase transition duration-150 ease-in-out border border-transparent rounded-md hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2'>
                    Enseignants Vacataires
                </a>
            </div>

            <div>

                <a href="{{ request()->routeIs('enseignant.index') ? route('enseignant.create') : route('vacataire.create') }}"
                    class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-gray-700 uppercase transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25'>
                    +
                </a>
            </div>
        </div>


        @if (session('success'))
            <div
                class="flex items-center justify-between w-full p-2 px-4 my-4 font-bold text-green-600 rounded-lg bg-gray-50">
                <span>{{ session('success') }}</span>
                <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-check">
                        <path d="M20 6 9 17l-5-5" />
                    </svg></span>
            </div>
        @endif

        @yield('content')


    </div>

</x-app-layout>
