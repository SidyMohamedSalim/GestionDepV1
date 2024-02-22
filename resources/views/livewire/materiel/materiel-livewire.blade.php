<div>
    <div>
        @if (session('saveAcquisition'))
        <div
            class="flex items-center justify-between w-full p-2 px-4 my-4 font-bold rounded-lg bg-primary text-success">
            <span>{{ session('saveAcquisition') }}</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-check">
                <path d="M20 6 9 17l-5-5" />
            </svg>
        </div>
        @endif

    </div>
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

                @if ($categorie == 'Equipement')
                <td class="px-6 py-4">
                    {{ $materiel->numero_invetaire }}
                </td>
                @endif

                <td class="px-6 py-4">
                    {{ $materiel->reference }}

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


                    <button class="text-success" wire:click.prevent="startAcquisition({{ $materiel->id }})">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-plus">
                            <path d="M5 12h14" />
                            <path d="M12 5v14" />
                        </svg>
                    </button>
                </td>
            </tr>

            @if ($materielAcquisitionId == $materiel->id)
            <livewire:materiels.materiel-acquisition-livewire :materiel_id="$materiel->id" :key="$materiel->id" />
            @endif

            @empty
            <div class="flex items-center justify-center w-full h-full">
                <p>Vide !!</p>
            </div>
            @endforelse

        </tbody>

    </table>
    <div class="py-6">{{ $materiels->links() }}</div>
</div>
