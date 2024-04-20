<div>

    <div>

        <x-succes-message name="saveAcquisition" />

    </div>

    <div class="py-4">
        <form class="grid gap-2 md:grid-cols-4">
            <x-search-input name="designation" placeholder="Recherche par designation" />
            <x-search-input name="categorie" placeholder="Recherche par categorie" />
            <x-search-input name="type" placeholder="Recherche par type" />
            <x-search-input name="reference" placeholder="Recherche par reference" />
        </form>
    </div>


    {{-- filter imprimante and pc --}}
    <div class="py-4">
        <div class="flex gap-2 items-center">
            <x-tool-filter fieldname="Imprimante" :selectedValue="$filterByImprimanteOrOrdinateur" />
            <x-tool-filter fieldname="Ordinateur" :selectedValue="$filterByImprimanteOrOrdinateur" />
        </div>
    </div>

    <table class="w-full text-sm text-left rtl:text-right">

        <thead class="text-xs text-white uppercase bg-primary">
            <tr>
                <x-table-header fieldname="active" :selectedFieldName="$orderByField"
                    :orderDirection="$orderByDirection">
                    Status
                </x-table-header>
                <x-table-header fieldname="designation" :selectedFieldName="$orderByField"
                    :orderDirection="$orderByDirection">
                    Designation
                </x-table-header>
                <th scope="col" class="px-6 py-3">
                    Categorie
                </th>
                <x-table-header fieldname="type" :selectedFieldName="$orderByField" :orderDirection="$orderByDirection">
                    Type
                </x-table-header>
                <x-table-header fieldname="reference_id" :selectedFieldName="$orderByField"
                    :orderDirection="$orderByDirection">
                    Reference
                </x-table-header>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($materiels as $materiel)
            <tr :key="$materiel->id" class="border-b odd:bg-white">
                <th scope="row" class="px-6 py-4 font-bold whitespace-nowrap">
                    <x-status-icons :active="$materiel->active" />
                </th>
                <th scope="row" class="px-6 py-4 font-bold whitespace-nowrap">
                    {{ $materiel->designation }}
                </th>
                <td class="px-6 py-4">
                    @if ($materiel->type == 'Informatique' && $materiel->categorie == "Equipement")
                    Materiel
                    @else
                    {{ $materiel->categorie }}
                    @endif

                </td>
                <td class="px-6 py-4">
                    {{ $materiel->type }}
                </td>
                <td class="px-6 py-4">
                    {{ $materiel->reference }}

                </td>
                <td class="flex justify-evenly items-center px-6 py-4">
                    {{-- editer --}}
                    <a href="{{ route('materiel.materiel.edit',$materiel) }}"
                        class="font-medium text-primary dark:text-primary hover:underline">

                        <x-icons.edit />
                    </a>

                    {{-- voir --}}
                    <a href="{{ route('materiel.materiel.show',$materiel) }}">
                        <x-icons.eyes />
                    </a>


                    {{-- acquisition --}}
                    <x-modal-alpine title="Nouvelle acquisition" :key="$materiel->id"
                        name="materiel de {{ $materiel->id }}">
                        <x-slot name="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-success" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus">
                                <path d="M5 12h14" />
                                <path d="M12 5v14" />
                            </svg>
                        </x-slot>
                        <livewire:materiels.acquisition-livewire :materiel="$materiel" :key="$materiel->id" />
                    </x-modal-alpine>


                    @if (count($materiel->equipement) == 0 && count($materiel->fourniture) == 0)
                    <x-modal-alpine title="Suppression" :key="$materiel->id" name="materiel de {{ $materiel->id }}">
                        <x-slot name="icon">
                            <x-icons.delete />
                        </x-slot>

                        <div class="px-3">
                            <h1 class="py-6">Voulez vous vraiment supprimer cet element</h1>
                            <a class="px-4 py-2 my-2 text-white bg-red-500 rounded-lg"
                                href="{{ route('materiel.materiel.destroy',$materiel) }}">Supprimer</a>
                        </div>
                        {{--
                        <livewire:modals.confirm-delete-modal :elementId="$enseignant->id"
                            routeName='enseignant.destroy' key="delete-{{ $enseignant->id }}" /> --}}
                    </x-modal-alpine>
                    @endif


                </td>
            </tr>




            @empty
            <div class="flex justify-center items-center w-full h-full">
                <p>Vide !!</p>
            </div>
            @endforelse

        </tbody>

    </table>
    <div class="py-6">{{ $materiels->links() }}</div>
</div>
