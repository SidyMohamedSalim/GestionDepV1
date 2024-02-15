<div>

    <div class="py-4">
        <form class="grid gap-2 md:grid-cols-2">
            <x-search-input name="nom" placeholder="Recherche par nom" />
            <x-search-input name="email" placeholder="Recherche par email" />
        </form>
    </div>

    <table class="w-full text-sm text-left">

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
                <x-table-header fieldname="date_debut" :selectedFieldName="$orderByField" :orderDirection="$orderByDirection">
                    Debut
                </x-table-header>
                <x-table-header fieldname="date_fin" :selectedFieldName="$orderByField" :orderDirection="$orderByDirection">
                    Fin
                </x-table-header>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($enseignants as $enseignant)
                <tr class="border-b odd:bg-white">
                    <td class="px-6 py-4">
                        <x-status-icons :active="$enseignant->active" />
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $enseignant->nom }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $enseignant->email }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $enseignant->date_debut }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $enseignant->date_fin ?? 'En cours...' }}
                    </td>
                    <td class="flex items-center justify-center gap-4 px-6 py-4">

                        {{-- edit --}}
                        <a href="{{ route('vacataire.edit', $enseignant) }}"
                            class="font-medium text-primary dark:text-primary hover:underline">
                            <x-icons.edit />
                        </a>

                        <a href="{{ route('vacataire.show', $enseignant) }}">
                            <x-icons.eyes />
                        </a>


                        <button
                            wire:click="$dispatch('openModal', { component: 'modals.confirm-delete-modal', arguments: { elementId: {{ $enseignant->id }}, routeName: 'vacataire.destroy' }})"
                            class="text-red-500">
                            <x-icons.delete />
                        </button>


                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="py-6">{{ $enseignants->links() }}</div>
</div>
