<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}


    <div class="mx-auto max-w-screen-xl">

        <div class="flex md:justify-center max-md:gap-4 md:items-center max-md:flex-col max-md:mx-7">
            <div class="flex-1 md:py-12 max-md:w-full">
                <div class="mx-auto max-w-7xl h-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden bg-gray-50 shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <h1 class="font-bold">Enseignants Permanents</h1>
                            <p class="text-xl">{{ $count_enseignant }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex-1 md:py-12 max-md:w-full">
                <div class="mx-auto max-w-7xl h-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden bg-gray-50 shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <h1 class="font-bold">Enseignants Vacataires</h1>
                            <p class="text-xl">{{ $count_vacataire }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-1 md:py-12 max-md:w-full">
                <div class="mx-auto max-w-7xl h-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden bg-gray-50 shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <h1 class="font-bold">Bureaux</h1>
                            <p class="text-xl">{{ $count_bureau }}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        {{-- materiel --}}

        <div class="flex-1 md:py-6 max-md:w-full">
            <div class="mx-auto max-w-7xl h-full sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-gray-50 shadow-sm sm:rounded-lg">

                    <div class="p-6 text-gray-900">
                        <h1 class="mb-4 text-xl font-extrabold">Materiels</h1>

                        <div class="grid md:grid-cols-3">
                            <div class="flex-1 md:py-6 max-md:w-full">
                                <div class="mx-auto max-w-7xl h-full sm:px-6 lg:px-8">
                                    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                                        <div class="p-6 text-gray-900">
                                            <h1 class="py-2 text-lg font-extrabold">Stocks</h1>
                                            <p class="text-sm">
                                                <span class="font-bold">Inventoriée : </span>
                                                {{ $stocks_inventoriee }}
                                            </p>
                                            <p class="text-sm">
                                                <span class="font-bold">Non Inventoriée : </span>
                                                {{ $stocks_not_inventorie }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- aperçu General --}}

        <div class="flex-1 md:py-6 max-md:w-full">
            <div class="mx-auto max-w-7xl h-full sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-gray-50 shadow-sm sm:rounded-lg">

                    <div class="p-6 text-gray-900">
                        <h1 class="mb-4 text-xl font-extrabold">Aperçu</h1>

                        <livewire:show-materiel-enseignant-bureau />
                    </div>
                </div>
            </div>
        </div>

    </div>




</x-app-layout>