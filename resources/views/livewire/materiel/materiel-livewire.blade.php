<div>

    <table class="w-full text-sm text-left rtl:text-right ">

        <thead class="text-xs text-white uppercase bg-primary ">
            <tr>
                <x-table-header fieldname="active" :selectedFieldName="$orderByField"
                    :orderDirection="$orderByDirection">
                    Status
                </x-table-header>
                <th scope="col" class="px-6 py-3">
                    Designation
                </th>

                @if ($categorie == 'Equipement')
                <x-table-header fieldname="numero_inventaire" :selectedFieldName="$orderByField"
                    :orderDirection="$orderByDirection">
                    Inventaire
                </x-table-header>
                @endif
                <x-table-header fieldname="date_acquisition" :selectedFieldName="$orderByField"
                    :orderDirection="$orderByDirection">
                    Date Acquisition
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
            <tr class="border-b odd:bg-white">
                <th scope="row" class="px-6 py-4 font-bold whitespace-nowrap">
                    <x-status-icons :active="$materiel->active" />
                </th>
                <th scope="row" class="px-6 py-4 font-bold whitespace-nowrap">
                    {{ $materiel->materiel->designation }}
                </th>

                @if ($categorie == 'Equipement')
                <td class="px-6 py-4">
                    {{ $materiel->numero_inventaire }}
                </td>
                @endif
                <td class="px-6 py-4">
                    {{ $materiel->date_acquisition }}
                </td>
                <td class="px-6 py-4">
                    {{ $materiel->reference->title }}

                </td>
                <td class="flex items-center px-6 py-4 justify-evenly">
                    {{-- editer --}}
                    <a href="{{ $categorie == 'Equipement' ? route('materiel.equipement.edit',$materiel) :
                        route('materiel.fourniture.edit',$materiel) }}"
                        class="font-medium text-primary dark:text-primary hover:underline">

                        <x-icons.edit />
                    </a>

                    {{-- voir --}}
                    <a href="{{ $categorie == 'Equipement' ? route('materiel.equipement.show',$materiel) :
                        route('materiel.fourniture.show',$materiel) }}">
                        <x-icons.eyes />
                    </a>

                    {{--
                    affectation

                    <button
                        wire:click="$dispatch('openModal', { component: 'materiel-bureau-modal', arguments: { materiel: {{ $materiel }} }})"
                        class="text-success">
                        <x-icons.desktop />
                    </button> --}}


                    {{-- delete --}}



                    <button
                        wire:click="$dispatch('openModal', { component: 'modals.confirm-delete-modal', arguments: { elementId: {{ $materiel->id }}, routeName: {{$categorie == 'Equipement' ? 'materiel.equipement.destroy' : 'materiel.fourniture.destroy' }})"
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
    <div class="py-6">{{ $materiels->links() }}</div>
</div>
