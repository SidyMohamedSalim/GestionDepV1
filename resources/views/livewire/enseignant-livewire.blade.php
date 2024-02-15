<div>



    <div class="py-4">
        <form class="grid gap-2 md:grid-cols-3">
            <x-search-input name="nom" placeholder="Recherche par nom" />
            <x-search-input name="prenom" placeholder="Recherche par prenom" />
            <x-search-input name="email" placeholder="Recherche par email" />
        </form>
    </div>



    <table class="w-full text-sm text-left rtl:text-right ">

        <thead class="text-xs text-white uppercase bg-primary ">
            <tr>
                <x-table-header fieldname="active" :selectedFieldName="$orderByField" :orderDirection="$orderByDirection">
                    Status
                </x-table-header>
                <x-table-header fieldname="nom" :selectedFieldName="$orderByField" :orderDirection="$orderByDirection">
                    Nom
                </x-table-header>



                <x-table-header fieldname="email" :selectedFieldName="$orderByField" :orderDirection="$orderByDirection">
                    Email
                </x-table-header>
                <x-table-header fieldname="daterecrutement" :selectedFieldName="$orderByField" :orderDirection="$orderByDirection">
                    Date Recrutement
                </x-table-header>
                <x-table-header fieldname="grade" :selectedFieldName="$orderByField" :orderDirection="$orderByDirection">
                    Grade
                </x-table-header>

                <th scope="col" class="px-6 py-3">
                    Bureau
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse  ($enseignants as $enseignant)
                <tr class="border-b odd:bg-white">
                    <th scope="row" class="px-6 py-4 font-bold whitespace-nowrap">
                        <x-status-icons :active="$enseignant->active" />
                    </th>
                    <th scope="row" class="px-6 py-4 font-bold whitespace-nowrap">
                        {{ $enseignant->nom }} {{ $enseignant->prenom }}
                    </th>

                    <td class="px-6 py-4">
                        {{ $enseignant->email }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $enseignant->daterecrutement }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $enseignant->grade }}

                    </td>
                    <td class="px-6 py-4">
                        @forelse ($enseignant->bureau as $bureau)
                            <a href="{{ route('bureau.index') }}" class="hover:underline hover:italic">
                                {{ $bureau->numero_bureau }}</a>
                        @empty
                            <p class=" hover:cursor-not-allowed">Pas de Bureau</p>
                        @endforelse

                    </td>
                    <td class="flex items-center px-6 py-4 justify-evenly">
                        {{-- editer --}}
                        <a href="{{ route('enseignant.edit', $enseignant) }}"
                            class="font-medium text-primary dark:text-primary hover:underline">

                            <x-icons.edit />
                        </a>

                        {{-- voir --}}
                        <a href="{{ route('enseignant.show', $enseignant) }}">
                            <x-icons.eyes />
                        </a>



                        {{-- affectation --}}

                        <button
                            wire:click="$dispatch('openModal', { component: 'enseignant.enseignant-bureau-modal', arguments: { enseignant: {{ $enseignant }} }})"
                            class="text-success">
                            <x-icons.desktop />
                        </button>


                        {{-- delete --}}



                        <button
                            wire:click="$dispatch('openModal', { component: 'modals.confirm-delete-modal', arguments: { elementId: {{ $enseignant->id }}, routeName: 'enseignant.destroy' }})"
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
    <div class="py-6">{{ $enseignants->links() }}</div>
</div>
