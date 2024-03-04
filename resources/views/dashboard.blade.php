<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}





    <div class="max-w-screen-xl mx-auto">
        <div class="flex md:justify-center max-md:gap-4 md:items-center max-md:flex-col max-md:mx-7">
            <div class="flex-1 md:py-12 max-md:w-full">
                <div class="h-full mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow-sm bg-gray-50 sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <h1 class="font-bold">Enseignants Permanents</h1>
                            <p class="text-xl">{{ $count_enseignant }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex-1 md:py-12 max-md:w-full">
                <div class="h-full mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow-sm bg-gray-50 sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <h1 class="font-bold">Enseignants Vacataires</h1>
                            <p class="text-xl">{{ $count_vacataire }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-1 md:py-12 max-md:w-full">
                <div class="h-full mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow-sm bg-gray-50 sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <h1 class="font-bold">Bureaux</h1>
                            <p class="text-xl">{{ $count_bureau }}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>




</x-app-layout>