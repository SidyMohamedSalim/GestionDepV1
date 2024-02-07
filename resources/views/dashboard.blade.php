<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}


    <div class="flex items-center justify-center max-w-screen-xl mx-auto">
        <div class="flex-1 py-12">
            <div class="h-full mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h1 class="font-bold">Enseignants Permanents</h1>
                        <p class="text-xl">{{ $count_enseignant }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex-1 py-12">
            <div class="h-full mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h1 class="font-bold">Enseignants Vacataires</h1>
                        <p class="text-xl">{{ $count_vacataire }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex-1 py-12">
            <div class="h-full mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h1 class="font-bold">Bureaux</h1>
                        <p class="text-xl">{{ $count_bureau }}</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
