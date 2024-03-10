<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Informations sur le materiel <span class="font-extrabold text-primary">{{ $materiel->designation }}</span>
        </h2>
    </x-slot>

    <div class="flex justify-center py-12 mx-auto max-w-7xl">
        {{ Breadcrumbs::render('materielshow',$materiel) }}
    </div>

    <div class="pb-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-3xl">
                    <section>
                        {{-- header --}}
                        <header class="mb-4">
                            <h2 class="text-xl font-extrabold text-primary">
                                {{ __('Information') }}
                            </h2>
                        </header>

                        {{-- content --}}
                        <div class="flex flex-col w-full gap-2 mt-4">
                            <div class="flex flex-wrap items-center justify-between w-full">
                                <p><span class="font-extrabold">Designation : </span> {{ $materiel->designation }}</p>
                                <p><span class="font-extrabold">Reference : </span> {{ $materiel->reference }}</p>
                            </div>

                            <div class="flex items-center justify-between w-full">
                                <p><span class="font-extrabold">Categorie : </span> {{
                                    $materiel->categorie }}
                                </p>
                                <p><span class="font-extrabold"> Type : </span>
                                    {{ $materiel->type }}
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
                        <header class="flex items-center justify-between mb-4">
                            <h2 class="text-xl font-extrabold text-primary">
                                Differentes Acquisitions
                            </h2>
                            {{-- <p x-data=""
                                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest uppercase transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 disabled:opacity-25">
                                <x-icons.users />
                            </p> --}}
                        </header>

                        {{-- content --}}
                        <table class="w-full text-sm text-left rtl:text-right ">

                            <thead class="text-xs text-white uppercase bg-primary ">
                                <tr>
                                    @if ($materiel->categorie == 'Equipement')
                                    <th scope="col" class="px-6 py-3">
                                        Numero Inventaire
                                    </th>
                                    @endif

                                    <th scope="col" class="px-6 py-3">
                                        Quantite
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Quantite Rest.
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Date Acquisition
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($materiel->acquisition as $acquisition)
                                <tr class="border-b odd:bg-white">

                                    @if ($materiel->categorie == 'Equipement')
                                    <td class="px-6 py-4 ">
                                        {{ $acquisition->numero_inventaire }}
                                    </td>
                                    @endif
                                    <td class="px-6 py-4 ">
                                        {{ $acquisition->base_quantite}}
                                    </td>
                                    <td class="px-6 py-4 ">
                                        {{ $acquisition->quantite}}
                                    </td>
                                    <td class="px-6 py-4 ">
                                        {{ $acquisition->date_acquisition }}
                                    </td>

                                </tr>
                                @empty

                                @endforelse

                            </tbody>

                        </table>
                    </section>
                </div>
            </div>

            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div>
                    <section>
                        {{-- header --}}
                        <header class="flex items-center justify-between mb-4">
                            <h2 class="text-xl font-extrabold text-primary">
                                Affectations Enseignants pour ce materiel
                            </h2>
                            {{-- <p x-data=""
                                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest uppercase transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 disabled:opacity-25">

                            </p> --}}
                        </header>

                        {{-- content --}}
                        <table class="w-full text-sm text-left rtl:text-right ">

                            <thead class="text-xs text-white uppercase bg-primary ">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nom
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Prenom
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Quantité
                                    </th>

                                    <th scope="col" class="px-6 py-3">
                                        Date d'affectation
                                    </th>

                                    <th scope="col" class="px-6 py-3">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($materiel->acquisition as $acquisition)
                                <tr class="bg-gray-100 border-b">

                                    <td colspan="6" class="px-6 py-4 text-center">
                                        Enseignants Affectées pour l'acquisition fait le
                                        <span class="font-extrabold">{{$acquisition->date_acquisition }}</span>
                                        @if ($acquisition->numero_inventaire)
                                        <p>
                                            Numero Inventaire : <span
                                                class="font-extrabold">{{$acquisition->numero_inventaire }}</span>
                                        </p>
                                        @endif
                                    </td>


                                </tr>
                                @foreach ($acquisition->enseignant as $enseignant)
                                <tr class="border-b odd:bg-white">

                                    <td class="px-6 py-4">
                                        {{ $enseignant->nom }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $enseignant->prenom }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $enseignant->email }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $enseignant->pivot->quantite}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$enseignant->pivot->date_affectation }}
                                    </td>
                                    <td class="px-6 py-4">
                                        ------
                                    </td>

                                </tr>
                                @endforeach
                                @empty

                                @endforelse

                            </tbody>

                        </table>
                    </section>
                </div>
            </div>




        </div>
    </div>
</x-app-layout>