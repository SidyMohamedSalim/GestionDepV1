<div>


    <div class="m-6 mx-auto max-w-screen-xl">
        {{-- new bureaux --}}



        <div class="flex justify-end items-end mb-4">

            <a href="{{ route('bureau.create') }}"
                class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest uppercase bg-white rounded-md border border-gray-300 shadow-sm transition duration-150 ease-in-out hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 disabled:opacity-25'>
                + Nouveau Local
            </a>
        </div>

        <div class="py-4">
            <form class="grid gap-2 md:grid-cols-2">
                <x-search-input name="numero" placeholder="Recherche par numero" />
                <x-search-input name="designation" placeholder="Recherche par designation" />
            </form>
        </div>




        {{-- listing bureaux --}}

        <table class="w-full text-sm text-left rtl:text-right">

            <thead class="text-xs text-white uppercase bg-secondary">
                <tr>
                    <x-table-header fieldname="numero_bureau" :selectedFieldName="$orderByField"
                        :orderDirection="$orderByDirection">
                        Numero
                    </x-table-header>
                    <x-table-header fieldname="designation" :selectedFieldName="$orderByField"
                        :orderDirection="$orderByDirection">
                        Designation
                    </x-table-header>
                    <x-table-header fieldname="capacite" :selectedFieldName="$orderByField"
                        :orderDirection="$orderByDirection">
                        Cap Max
                    </x-table-header>
                    <th scope="col" class="px-6 py-3">
                        Nbre Actuel
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Imprimante
                    </th>
                    <x-table-header fieldname="date_acquisition" :selectedFieldName="$orderByField"
                        :orderDirection="$orderByDirection">
                        Date Acquisition
                    </x-table-header>
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bureaux as $bureau)
                <tr class="border-b odd:bg-white">
                    <th scope="row" class="px-6 py-4 font-bold whitespace-nowrap">
                        {{ $bureau->numero_bureau }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $bureau->designation }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $bureau->capacite }}
                    </td>
                    <td class="px-6 py-4">
                        {{ count($bureau->enseignant)}}
                    </td>
                    <td class="px-6 py-4">
                        @if (count($bureau->acquisition)> 0)
                        {{ $bureau->acquisition[0]->materiel->designation }} {{ $bureau->acquisition[0]->reference }}
                        @else
                        <x-icons.remove />
                        @endif

                    </td>
                    <td class="px-6 py-4">
                        {{ $bureau->date_acquisition }}
                    </td>

                    <td class="flex gap-3 justify-center items-center px-6 py-4">

                        {{-- edit --}}
                        <a href="{{ route('bureau.edit', $bureau) }}"
                            class="font-medium text-primary dark:text-primary hover:underline">
                            <x-icons.edit />
                        </a>

                        {{-- show --}}
                        <a href="{{ route('bureau.show', $bureau) }}">
                            <x-icons.eyes />
                        </a>

                        {{-- affectation enseignants --}}
                        <a x-data="" class="text-success"
                            href="{{ route('show_affecter_enseignants_bureau', $bureau) }}">
                            <x-icons.users />
                        </a>

                        <x-modal-alpine title="Affectation d'un materiel" :key="$bureau->id"
                            name="materiel de {{ $bureau->id }}">
                            <x-slot name="icon">
                                <x-icons.utils />
                            </x-slot>
                            <livewire:bureau.bureau-materiel-affectation-modal :acquisitions="$acquisitions"
                                :bureau="$bureau" key="materiel-{{$bureau->id}}" />
                        </x-modal-alpine>

                        {{-- delete --}}

                        <x-modal-alpine title="Suppression" :key="$bureau->id" name="bureau de {{ $bureau->id }}">
                            <x-slot name="icon">
                                <x-icons.delete />
                            </x-slot>
                            <livewire:modals.confirm-delete-modal :elementId="$bureau->id" routeName='bureau.destroy'
                                key="delete-{{ $bureau->id }}" />
                        </x-modal-alpine>


                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="py-6">{{ $bureaux->links() }}</div>

    </div>
</div>
