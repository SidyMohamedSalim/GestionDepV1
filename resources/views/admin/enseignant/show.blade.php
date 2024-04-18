<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Informations sur l'enseignant <span class="font-extrabold text-primary">{{ $enseignant->nom }} {{
                $enseignant->prenom }}</span>
        </h2>
    </x-slot>

    <div class="flex justify-center py-12 mx-auto max-w-7xl">
        {{ Breadcrumbs::render('enseignantshow',$enseignant) }}
    </div>

    <div class="pb-12">
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
                        <div class="flex flex-col gap-2 mt-4 w-full">
                            <div class="flex justify-between items-center w-full">
                                <p><span class="font-extrabold">Nom : </span> {{ $enseignant->nom }}</p>
                                <p><span class="font-extrabold">Prenom : </span> {{ $enseignant->prenom }}</p>
                            </div>
                            <div class="flex justify-between items-center w-full">
                                <p><span class="font-extrabold">Email : </span> {{ $enseignant->email }}</p>
                                <p><span class="font-extrabold">Grade : </span> {{ $enseignant->grade }}</p>
                            </div>
                            <div class="flex justify-between items-center w-full">
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

            @if (session('status'))
            <div
                class="flex justify-between items-center p-2 px-4 my-4 w-full font-bold rounded-lg bg-primary text-success">
                <span>{{ session('status') }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-check">
                    <path d="M20 6 9 17l-5-5" />
                </svg>
            </div>
            @endif

            {{-- acquisitions inventories --}}
            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div>
                    <section>
                        {{-- header --}}
                        <header class="flex justify-between items-center mb-4">
                            <h2 class="text-xl font-extrabold text-primary">
                                {{ __('acquisitions Inventoriées Reçus') }}
                            </h2>
                        </header>

                        {{-- content --}}
                        <table class="w-full text-sm text-left rtl:text-right">

                            <thead class="text-xs text-white uppercase bg-primary">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Numero Inventaire
                                    </th>
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
                                @foreach ($enseignant->equipement as $acquisition)

                                <tr class="border-b odd:bg-white">
                                    <td class="px-6 py-4">
                                        {{ $acquisition->numero_inventaire }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $acquisition->materiel->designation }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $acquisition->pivot->quantite }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $acquisition->pivot->date_affectation }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <x-signature :signed="$acquisition->pivot->signature" />
                                    </td>
                                    <td class="px-6 py-4">
                                        <x-modal-alpine title="restitution" :key="$acquisition->id"
                                            name="materiel de {{ $acquisition->id }}">
                                            <x-slot name="icon">
                                                <span
                                                    class="text-xs text-red-500 cursor-pointer hover:underline">Restitué?</span>
                                            </x-slot>
                                            <form
                                                action="{{ route('restoreMateriel.enseignant',['acquisition'=>$acquisition->id,'enseignant'=>$enseignant->id]) }}"
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
                                @endforeach

                            </tbody>

                        </table>
                    </section>
                </div>
            </div>


            {{-- acquisitions non inventoriees --}}
            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div>
                    <section>
                        {{-- header --}}
                        <header class="flex justify-between items-center mb-4">
                            <h2 class="text-xl font-extrabold text-primary">
                                {{ __('acquisitions Non Inventoriées Reçus') }}
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
                                        quantite
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Date Affectation
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($enseignant->fourniture as $acquisition)


                                <tr class="border-b odd:bg-white">
                                    <td class="px-6 py-4">
                                        {{ $acquisition->materiel->designation }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $acquisition->pivot->quantite }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $acquisition->pivot->date_affectation }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </section>
                </div>
            </div>


            {{-- acquisitions restitues --}}
            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header class="mb-4">
                            <h2 class="text-xl font-extrabold text-primary">
                                {{ __('acquisitions Restituées') }}
                            </h2>
                        </header>
                    </section>


                </div>

                {{-- content --}}
                <table class="w-full text-sm text-left rtl:text-right">

                    <thead class="text-xs text-white uppercase bg-primary">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Numero Inventaire
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Designation
                            </th>

                            <th scope="col" class="px-6 py-3">
                                quantite
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Signé
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Date Restitution
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($enseignant->restitution as $restitution)
                        <tr class="border-b odd:bg-white">
                            <td class="px-6 py-4">
                                {{ $restitution->designation }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $restitution->numero_inventaire }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $restitution->quantite }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $restitution->signature }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $restitution->date_restitution }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>