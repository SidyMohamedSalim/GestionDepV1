<div>

    <div>
        <a href="{{ route('materiel.materiel.index') }}"
            class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest uppercase transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 disabled:opacity-25'>
            Admin des materiels
        </a>
    </div>






    <div class="flex items-center justify-between my-6 bg">
        <h1 class="text-2xl font-extrabold">Gestion des differentes acquisitions</h1>
        <a href="{{ route('materiel.materiel_acquisition.create') }}"
            class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest uppercase transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 disabled:opacity-25'>
            + Nouvelle acquisition
        </a>
    </div>


    <div class="py-4">
        <form class="grid gap-2 md:grid-cols-3">
            <x-search-input name="designation" placeholder="Recherche par designation" />
            <x-search-input name="categorie" placeholder="Recherche par categorie" />
            <x-search-input name="type" placeholder="Recherche par type" />
        </form>
    </div>
    <table class="w-full text-sm text-left rtl:text-right ">

        <thead class="text-xs text-white uppercase bg-primary ">
            <tr>
                <x-table-header fieldname="active" :selectedFieldName="$orderByField"
                    :orderDirection="$orderByDirection">
                    Etat
                </x-table-header>

                <th scope="col" class="px-6 py-3">
                    Designation
                </th>
                <th scope="col" class="px-6 py-3">
                    Categorie
                </th>
                <th scope="col" class="px-6 py-3">
                    type
                </th>

                <x-table-header fieldname="quantite" :selectedFieldName="$orderByField"
                    :orderDirection="$orderByDirection">
                    quantite
                </x-table-header>

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
            @forelse ($materiel_acquisitions as $materiel_acquisition)
            <tr class="border-b odd:bg-white">
                <th scope="row" class="px-6 py-4 font-bold whitespace-nowrap">
                    <x-status-icons :active="true" />
                </th>
                <td class="px-6 py-4">
                    {{ $materiel_acquisition->materiel->designation }}
                </td>
                <td class="px-6 py-4">
                    {{ $materiel_acquisition->materiel->categorie }}
                </td>
                <td class="px-6 py-4">
                    {{ $materiel_acquisition->materiel->type }}
                </td>
                <th scope="row" class="px-6 py-4 font-bold whitespace-nowrap">
                    {{ $materiel_acquisition->quantite }}
                </th>

                <td class="px-6 py-4">
                    {{ $materiel_acquisition->date_acquisition }}
                </td>

                <td class="flex items-center px-6 py-4 justify-evenly">
                    {{-- editer --}}
                    <a href="{{ route('materiel.materiel_acquisition.edit', $materiel_acquisition) }}"
                        class="font-medium text-primary dark:text-primary hover:underline">

                        <x-icons.edit />
                    </a>


                    {{-- affectation --}}




                    {{-- delete --}}



                    <button
                        wire:click="$dispatch('openModal', { component: 'modals.confirm-delete-modal', arguments: { elementId: {{ $materiel_acquisition->id }}, routeName: 'materiel.materiel_acquisition.destroy' }})"
                        class="text-danger">
                        <x-icons.delete />
                    </button>




                </td>
            </tr>
            @empty
            <div class="flex items-center justify-center w-full h-full">
                <p>Vide !!</p>
            </div>
            @endforelse

        </tbody>

    </table>
    <div class="py-6">{{ $materiel_acquisitions->links() }}</div>


</div>