<div>
    <div class="py-4">
        <form class="grid gap-2 md:grid-cols-3">
            <x-search-input name="nom" placeholder="Recherche par nom" />
            <x-search-input name="prenom" placeholder="Recherche par prenom" />
            <x-search-input name="email" placeholder="Recherche par email" />
        </form>
    </div>
    <div>
        <x-succes-message name="saveAffectation" />

    </div>

    <table class="w-full text-sm text-left rtl:text-right">
        <thead class="text-xs text-white uppercase bg-primary">
            <tr>
                <x-table-header fieldname="active" :selectedFieldName="$orderByField"
                    :orderDirection="$orderByDirection">Status</x-table-header>
                <x-table-header fieldname="nom" :selectedFieldName="$orderByField" :orderDirection="$orderByDirection">
                    Nom</x-table-header>
                <x-table-header fieldname="email" :selectedFieldName="$orderByField"
                    :orderDirection="$orderByDirection">Email</x-table-header>
                <x-table-header fieldname="daterecrutement" :selectedFieldName="$orderByField"
                    :orderDirection="$orderByDirection">Date Recrutement</x-table-header>
                <x-table-header fieldname="grade" :selectedFieldName="$orderByField"
                    :orderDirection="$orderByDirection">Grade</x-table-header>
                <th scope="col" class="px-6 py-3">Local</th>
                <th scope="col" class="px-6 py-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($enseignants as $enseignant)
            <tr class="border-b odd:bg-white">
                <th scope="row" class="px-6 py-4 font-bold whitespace-nowrap">
                    <x-status-icons :active="$enseignant->active" />
                </th>
                <th scope="row" class="px-6 py-4 font-bold whitespace-nowrap">
                    {{ $enseignant->nom }} {{ $enseignant->prenom }}
                </th>
                <td class="px-6 py-4">{{ $enseignant->email }}</td>
                <td class="px-6 py-4">{{ $enseignant->daterecrutement }}</td>
                <td class="px-6 py-4">{{ $enseignant->grade }}</td>
                <td class="px-6 py-4">
                    @forelse ($enseignant->bureau as $bureau)
                    <a href="{{ route('bureau.show',$bureau) }}" class="hover:underline hover:italic">{{
                        $bureau->numero_bureau }}</a>
                    @empty
                    <p class="hover:cursor-not-allowed">Pas de Bureau</p>
                    @endforelse
                </td>
                <td class="flex gap-3 justify-evenly items-center px-6 py-4">
                    <a href="{{ route('enseignant.edit', $enseignant) }}"
                        class="font-medium text-primary dark:text-primary hover:underline">
                        <x-icons.edit />
                    </a>
                    <a href="{{ route('enseignant.show', $enseignant) }}">
                        <x-icons.eyes />
                    </a>
                    <livewire:enseignant.enseignant-bureau-affectation-madal :enseignant="$enseignant"
                        :bureaux="$bureaux" key="bureau-{{$enseignant->id}}">
                        <livewire:enseignant.materiel-enseignant-affectation-modal
                            :fournitruesacquistions="$fournitures" :acquisitions="$acquisitions"
                            :enseignant="$enseignant" key="materiel-{{$enseignant->id}}">
                            <x-modal-alpine title="Suppression" :key="$enseignant->id"
                                name="materiel de {{ $enseignant->id }}">
                                <x-slot name="icon">
                                    <x-icons.delete />
                                </x-slot>
                                <livewire:modals.confirm-delete-modal :elementId="$enseignant->id"
                                    routeName='enseignant.destroy' key="delete-{{ $enseignant->id }}" />
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
    <div class="py-6">{{ $enseignants->links() }}</div>
</div>
