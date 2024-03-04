<div>


    <div class="max-w-screen-xl m-6 mx-auto">
        {{-- new bureaux --}}


        <div class="flex items-end justify-end mb-4">

            <a href="{{ route('bureau.create') }}"
                class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest uppercase transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 disabled:opacity-25'>
                + Nouveau Bureau
            </a>
        </div>

        <div class="py-4">
            <form class="grid gap-2 md:grid-cols-2">
                <x-search-input name="numero" placeholder="Recherche par numero" />
                <x-search-input name="designation" placeholder="Recherche par designation" />
            </form>
        </div>




        {{-- listing bureaux --}}

        <table class="w-full text-sm text-left rtl:text-right ">

            <thead class="text-xs text-white uppercase bg-secondary ">
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
                        Capacitte
                    </x-table-header>
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
                    <th scope="row" class="px-6 py-4 font-bold whitespace-nowrap ">
                        {{ $bureau->numero_bureau }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $bureau->designation }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $bureau->capacite }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $bureau->date_acquisition }}
                    </td>
                    <td class="flex items-center justify-center gap-3 px-6 py-4">

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