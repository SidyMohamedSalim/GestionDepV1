<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Informations sur l'enseignant <span class="font-extrabold text-primary">{{ $enseignant->nom }} {{
                $enseignant->prenom }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-3xl">
                    <section>
                        {{-- header --}}
                        <header class="mb-4">
                            <h2 class="text-xl font-extrabold text-primary">
                                {{ __('Identité') }}
                            </h2>
                        </header>

                        {{-- content --}}
                        <div class="flex flex-col w-full gap-2 mt-4">
                            <div class="flex items-center justify-between w-full">
                                <p><span class="font-extrabold">Nom : </span> {{ $enseignant->nom }}</p>
                                <p><span class="font-extrabold">Prenom : </span> {{ $enseignant->prenom }}</p>
                            </div>
                            <div class="flex items-center justify-between w-full">
                                <p><span class="font-extrabold">Email : </span> {{ $enseignant->email }}</p>
                                <p><span class="font-extrabold">Grade : </span> {{ $enseignant->grade }}</p>
                            </div>
                            <div class="flex items-center justify-between w-full">
                                <p><span class="font-extrabold">Date de recrutement : </span> {{
                                    $enseignant->daterecrutement }}
                                </p>
                                <p><span class="font-extrabold">Status : </span> @if ($enseignant->active)
                                    Actif
                                    @else
                                    Non Actif
                                    @endif</p>
                            </div>

                            <div class="flex justify-between w-full fitems-center">
                                <p><span class="font-extrabold">Bureau : </span>
                                    @if (count($enseignant->bureau) > 0)
                                    {{ $enseignant->bureau[0]?->designation}}
                                    @else
                                    Pas de bureau
                                    @endif
                                </p>

                            </div>
                        </div>
                    </section>
                </div>
            </div>

            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div>
                    <section>
                        {{-- header --}}
                        <header class="mb-4">
                            <h2 class="text-xl font-extrabold text-primary">
                                {{ __('Materiels Reçus') }}
                            </h2>

                        </header>

                        {{-- content --}}
                        <table class="w-full text-sm text-left rtl:text-right ">

                            <thead class="text-xs text-white uppercase bg-primary ">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Designation
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        quantite
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Date Affectation
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Signée
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($enseignant->affectation as $affectation)
                                <tr class="border-b odd:bg-white">

                                    <td class="px-6 py-4">
                                        {{ $affectation->materiel->designation }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $affectation->quantite }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $affectation->date_affectation }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $affectation->signature }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <p class="text-red-500 cursor-pointer hover:underline">X Restitué</p>
                                    </td>

                                </tr>
                                @empty
                                <div class="flex items-center justify-center w-full h-full">
                                    <p>Vide !!</p>
                                </div>
                                @endforelse

                            </tbody>

                        </table>
                    </section>
                </div>
            </div>

            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header class="mb-4">
                            <h2 class="text-xl font-extrabold text-primary">
                                {{ __('Materiels Restitués') }}
                            </h2>

                        </header>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>