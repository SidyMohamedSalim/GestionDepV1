<div>


    <div class="py-4">


        <form class="grid gap-2 md:grid-cols-3">
            <x-search-input name="nom" placeholder="Recherche par nom" />
            <x-search-input name="prenom" placeholder="Recherche par prenom" />
            <x-search-input name="email" placeholder="Recherche par email" />
        </form>
    </div>
    <div>
        @if (session('saveAffectation'))
        <div
            class="flex items-center justify-between w-full p-2 px-4 my-4 font-bold rounded-lg bg-primary text-success">
            <span>{{ session('saveAffectation') }}</span>
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

                <x-table-header fieldname="nom" :selectedFieldName="$orderByField" :orderDirection="$orderByDirection">
                    Nom
                </x-table-header>

                <x-table-header fieldname=" email" :selectedFieldName="$orderByField"
                    :orderDirection="$orderByDirection">
                    Email
                </x-table-header>
                <x-table-header fieldname="daterecrutement" :selectedFieldName="$orderByField"
                    :orderDirection="$orderByDirection">
                    Date Recrutement
                </x-table-header>
                <x-table-header fieldname="grade" :selectedFieldName="$orderByField"
                    :orderDirection="$orderByDirection">
                    Grade
                </x-table-header>

                <th scope="col" class="px-6 py-3">
                    Local
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
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
                    <a href="{{ route('bureau.show',$bureau) }}" class="hover:underline hover:italic">
                        {{ $bureau->numero_bureau }}</a>
                    @empty
                    <p class=" hover:cursor-not-allowed">Pas de Bureau</p>
                    @endforelse

                </td>
                <td class="flex items-center gap-3 px-6 py-4 justify-evenly">
                    {{-- editer --}}
                    <a href="{{ route('enseignant.edit', $enseignant) }}"
                        class="font-medium text-primary dark:text-primary hover:underline">
                        <x-icons.edit />
                    </a>

                    {{-- voir --}}
                    <a href="{{ route('enseignant.show', $enseignant) }}">
                        <x-icons.eyes />
                    </a>

                    {{-- affectation bureau --}}
                    <x-modal-alpine title="Selectionner un bureau" :key="$enseignant->id"
                        name="desktop de {{ $enseignant->id }}">
                        <x-slot name="icon">
                            <x-icons.desktop />
                        </x-slot>
                        <livewire:enseignant.enseignant-bureau-affectation-madal :enseignant="$enseignant"
                            :bureaux="$bureaux" key="bureau-{{$enseignant->id}}">
                    </x-modal-alpine>


                    {{-- affectation materiel --}}
                    <x-modal-alpine title="Affectation d'un materiel" :key="$enseignant->id"
                        name="materiel de {{ $enseignant->id }}">
                        <x-slot name="icon">
                            <x-icons.utils />
                        </x-slot>
                        <livewire:enseignant.materiel-enseignant-affectation-modal :acquisitions="$acquisitions"
                            :enseignant="$enseignant" key="materiel-{{$enseignant->id}}" />
                    </x-modal-alpine>
                    {{-- delete --}}

                    <x-modal-alpine title="Suppression" :key="$enseignant->id" name="materiel de {{ $enseignant->id }}">
                        <x-slot name="icon">
                            <x-icons.delete />
                        </x-slot>
                        <livewire:modals.confirm-delete-modal :elementId="$enseignant->id"
                            routeName='enseignant.destroy' key="delete-{{ $enseignant->id }}" />
                    </x-modal-alpine>


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
