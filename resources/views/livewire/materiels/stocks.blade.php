<div>

    @php
    $isInventoriee = $categorie == 'Equipement';
    @endphp

    <div>
        <a href="{{ route('materiel.materiel.index') }}"
            class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest uppercase bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 disabled:opacity-25'>
            Admin des materiels
        </a>
    </div>


    <div class="flex justify-between items-center my-6 bg">
        <h1 class="text-2xl font-extrabold">Gestion des differentes acquisitions</h1>
        <a href="{{ route('materiel.equipement.create') }}"
            class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest uppercase bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 disabled:opacity-25'>
            + Nouvelles acquisitions
        </a>
    </div>
    <div>
        @if (session('saveAffectation'))
        <div
            class="flex justify-between items-center p-2 px-4 my-4 w-full font-bold rounded-lg bg-primary text-success">
            <span>{{ session('saveAffectation') }}</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-check">
                <path d="M20 6 9 17l-5-5" />
            </svg>
        </div>
        @endif
    </div>

    <div class="py-4">
        <div class="flex gap-4 items-center my-6">
            <button wire:click.prevent="changeCategorie('Equipement')" @class(['inline-flex items-center px-8 py-2
                text-xs font-semibold tracking-widest uppercase transition duration-150 ease-in-out border
                border-transparent rounded-md hover:bg-primary focus:bg-primary active:bg-primary focus:outline-none
                focus:ring-2 focus:ring-primary focus:ring-offset-2 ',"text-white bg-primary"=>$categorie == "Equipement" ])>Inventoriée </button>
            <button wire:click.prevent=' changeCategorie("Fourniture")' @class([' inline-flex items-center px-8 py-2
                text-xs font-semibold tracking-widest uppercase transition duration-150 ease-in-out border
                border-transparent rounded-md hover:bg-primary focus:bg-primary active:bg-primary focus:outline-none
                focus:ring-2 focus:ring-primary focus:ring-offset-2',"text-white bg-primary"=>$categorie == 'Fourniture'
                ])>
                Non Inventoriée
            </button>
        </div>

        <form class="grid gap-2 md:grid-cols-3">
            @if ($isInventoriee)
            <x-search-input name="numero_inventaire" placeholder="Recherche par numero inventaire" />
            @endif
            <x-search-input name="designation" placeholder="Recherche par designation" />
            <x-search-input name="destination" placeholder="Recherche par destination" />

        </form>
    </div>

    {{-- filter imprimante and pc --}}
    @if ($categorie == 'Equipement')
    <div class="py-4">
        <div class="flex gap-2 items-center">
            <x-tool-filter fieldname="Imprimante" :selectedValue="$filterByImprimanteOrOrdinateur" />
            <x-tool-filter fieldname="Ordinateur" :selectedValue="$filterByImprimanteOrOrdinateur" />
        </div>
    </div>
    @endif

    <table class="w-full text-sm text-left rtl:text-right">

        <thead class="text-xs text-white uppercase bg-primary">
            <tr>
                @if ($isInventoriee)
                <x-table-header fieldname="numero_inventaire" :selectedFieldName="$orderByField"
                    :orderDirection="$orderByDirection">
                    Numero Inventaire
                </x-table-header>
                @endif
                <th scope="col" class="px-6 py-3">
                    Designation
                </th>
                <x-table-header fieldname="destination" :selectedFieldName="$orderByField"
                    :orderDirection="$orderByDirection">
                    Destiné Au
                </x-table-header>

                <x-table-header fieldname="categorie" :selectedFieldName="$orderByField"
                    :orderDirection="$orderByDirection">
                    Type
                </x-table-header>

                <x-table-header fieldname="quantite" :selectedFieldName="$orderByField"
                    :orderDirection="$orderByDirection">
                    quantite
                </x-table-header>
                @if ($isInventoriee)
                <th scope="col" class="px-6 py-3">
                    Nbre de Restitution
                </th>
                @endif
                <x-table-header fieldname="date_acquisition" :selectedFieldName="$orderByField"
                    :orderDirection="$orderByDirection">
                    Date d'acquisition
                </x-table-header>

                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($equipements as $equipement)
            <tr class="border-b odd:bg-white">
                @if ($isInventoriee)
                <td class="px-6 py-4 text-primary">
                    {{ $equipement->numero_inventaire }}
                </td>
                @endif
                <td class="px-6 py-4">
                    {{ $equipement->materiel->designation }}
                    {{ $equipement->materiel->reference }}
                </td>
                <td class="px-6 py-4">
                    @if ($equipement->destination == 'informatique')
                    Departement Informatique
                    @else
                    Laboratoire
                    @endif
                </td>
                <td class="px-6 py-4">
                    @if ( $equipement->materiel->categorie == "Equipement" &&
                    $equipement->materiel->type == 'Informatique' )
                    Matériel
                    @else
                    {{ $equipement->materiel->categorie }}
                    @endif
                    {{ $equipement->materiel->type }}
                </td>
                <th scope="row" class="px-6 py-4 font-bold whitespace-nowrap">
                    {{ $equipement->quantite }}
                </th>
                @if ($isInventoriee)
                <td class="px-6 py-4">
                    {{ $equipement->nbre_restitution }}
                </td>
                @endif

                <td class="px-6 py-4">
                    {{ $equipement->date_acquisition }}
                </td>

                <td class="flex gap-4 justify-evenly items-center px-6 py-4">
                    {{-- voir --}}
                    {{-- <a href="{{ route('materiel.equipement.show', $equipement) }}"
                        class="font-medium text-primary dark:text-primary hover:underline">

                        <x-icons.eyes />
                    </a> --}}


                    {{-- affectation --}}
                    <x-modal-alpine title="Affectation d'un enseignant" :key="$equipement->id"
                        name="enseignant de {{ $equipement->id }}">
                        <x-slot name="icon">
                            <x-icons.utils />
                        </x-slot>
                        <livewire:materiel.enseignant-materiel-affectation-modal :enseignants="$enseignants"
                            :acquisition="$equipement" key="materiel-{{$equipement->id}}"
                            :elementId="$equipement->id" />
                    </x-modal-alpine>



                    {{-- delete --}}


                    <x-modal-alpine title="Suppression" :key="$equipement->id" name="materiel de {{ $equipement->id }}">
                        <x-slot name="icon">
                            <x-icons.delete />
                        </x-slot>
                        <livewire:modals.confirm-delete-modal :elementId="$equipement->id"
                            routeName='materiel.equipement.destroy' key="delete-{{ $equipement->id }}" />
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
    <div class="py-6">{{ $equipements->links() }}</div>


</div>
