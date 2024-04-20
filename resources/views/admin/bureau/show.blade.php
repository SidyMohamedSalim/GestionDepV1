<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Informations sur le local <span class="font-extrabold text-primary">{{ $bureau->designation }}</span>
        </h2>
    </x-slot>


    <div class="flex justify-center py-12 mx-auto max-w-7xl">
        {{ Breadcrumbs::render('bureaushow', $bureau ) }}
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
                        <div class="flex flex-col gap-2 mt-4 w-full">
                            <div class="flex justify-between items-center w-full">
                                <p><span class="font-extrabold">Designation : </span> {{ $bureau->designation }}</p>
                                <p><span class="font-extrabold">Capacité : </span> {{ $bureau->capacite }}</p>
                            </div>

                            <div class="flex justify-between items-center w-full">
                                <p><span class="font-extrabold">Date d'acquisition : </span> {{
                                    $bureau->date_acquisition }}
                                </p>
                                <p><span class="font-extrabold">Nombre d'enseignants : </span>
                                    {{count($bureau->enseignant)}}
                                </p>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

            {{-- liste des ensiegnants --}}
            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div>
                    <section>
                        {{-- header --}}
                        <header class="flex justify-between items-center mb-4">
                            <h2 class="text-xl font-extrabold text-primary">
                                {{ __('Enseignants du local') }}
                            </h2>
                            <a x-data=""
                                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest uppercase bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 disabled:opacity-25"
                                href="{{ route('show_affecter_enseignants_bureau', $bureau) }}">
                                <x-icons.users />
                            </a>
                        </header>

                        {{-- content --}}
                        <table class="w-full text-sm text-left rtl:text-right">

                            <thead class="text-xs text-white uppercase bg-primary">
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
                                        Date de Recrutement
                                    </th>

                                    <th scope="col" class="px-6 py-3">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($bureau->enseignant as $enseignant)
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
                                        {{ $enseignant->daterecrutement }}
                                    </td>
                                    <td class="flex gap-2 items-center px-6 py-4">
                                        <div class="text-red-500 cursor-pointer hover:underline">
                                            <x-icons.delete />
                                        </div>
                                        {{-- voir --}}
                                        <a href="{{ route('enseignant.show', $enseignant) }}">
                                            <x-icons.eyes />
                                        </a>
                                    </td>

                                </tr>
                                @empty
                                <div class="flex justify-center items-center w-full h-full">
                                    <p>Vide !!</p>
                                </div>
                                @endforelse

                            </tbody>

                        </table>
                    </section>
                </div>
            </div>

            {{-- Liste des mateiels affectes a un local --}}
            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div>
                    <section>
                        {{-- header --}}
                        <header class="flex justify-between items-center mb-4">
                            <h2 class="text-xl font-extrabold text-primary">
                                Materiels Affectés à ce local
                            </h2>

                        </header>


                        {{-- content --}}
                        <table class="w-full text-sm text-left rtl:text-right">

                            <thead class="text-xs text-white uppercase bg-primary">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Designation
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        signé ?
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Partager
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Date Affection
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Composants
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($bureau->acquisition as $acquisition)
                                <tr class="bg-sky-50 border-y">
                                    <td class="px-6 py-4">
                                        {{ $acquisition->materiel->designation }} {{ $acquisition->materiel->reference
                                        }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <x-signature :signed="$acquisition->pivot->signature" />
                                    </td>
                                    <td class="px-6 py-4">
                                        oui
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $acquisition->pivot->date_affectation }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <ul>
                                            @foreach ($acquisition->fournitures as $composant)
                                            <li class="flex items-center mb-2">
                                                <span class="mr-2 w-2 h-2 rounded-full bg-primary"></span>
                                                <p class="flex gap-2 justify-center items-center">
                                                    <span>
                                                        {{ $composant->materiel->designation }}
                                                        {{$composant->materiel->reference }}
                                                    </span>
                                                    <span class="text-xs">
                                                        Quantité : {{ $composant->pivot->quantite }}
                                                    </span>

                                                    {{-- TODO
                                                    //Retrait
                                                    --}}
                                                    <span
                                                        class="px-2 font-extrabold text-red-500 cursor-pointer hover:underline">
                                                        X
                                                    </span>
                                                </p>
                                            </li>
                                            <li class="">

                                            </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td class="px-6 py-4">
                                        <x-modal-alpine title="Ajouter un composant" :key="$acquisition->id"
                                            name="composant de {{ $acquisition->id }}">
                                            <x-slot name="icon">
                                                <p class="cursor-pointer text-primary hover:underline">Ajouter un
                                                    composant</p>
                                            </x-slot>
                                            <livewire:materiel.add-composant :acquisition="$acquisition"
                                                :composants="$composants" />
                                        </x-modal-alpine>
                                        <x-modal-alpine title="restitution" :key="$acquisition->id"
                                            name="materiel de {{ $acquisition->id }}">
                                            <x-slot name="icon">
                                                <span
                                                    class="text-xs text-red-500 cursor-pointer hover:underline">Restitué?</span>
                                            </x-slot>
                                            <form
                                                action="{{ route('restoreMateriel.bureau',['acquisition'=>$acquisition->id,'bureau'=>$bureau->id]) }}"
                                                method="post">
                                                @csrf
                                                <p class="my-6 text-lg font-bold text-center">Voulez-vous vraiment le
                                                    restitué ?</p>
                                                <input type="text" class="hidden" name="affectation_id" id=""
                                                    value="{{$acquisition->pivot->id}}">
                                                <button type="submit"
                                                    class="px-6 py-2 mt-4 mb-4 text-white bg-red-500 rounded-lg cursor-pointer hover:underline">
                                                    Valider</button>
                                            </form>

                                        </x-modal-alpine>
                                    </td>
                                </tr>
                                @empty
                                <div class="flex justify-center items-center w-full h-full">
                                    <p>Vide !!</p>
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
