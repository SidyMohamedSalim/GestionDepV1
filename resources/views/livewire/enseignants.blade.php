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
                <x-table-header fieldname="nom" :selectedFieldName="$orderByField" :orderDirection="$orderByDirection">
                    Nom
                </x-table-header>

                <x-table-header fieldname="prenom" :selectedFieldName="$orderByField" :orderDirection="$orderByDirection">
                    Prenom
                </x-table-header>

                <x-table-header fieldname="email" :selectedFieldName="$orderByField" :orderDirection="$orderByDirection">
                    Email
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
                        {{ $enseignant->nom }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $enseignant->prenom }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $enseignant->email }}
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

                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-notebook-pen">
                                <path d="M13.4 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-7.4" />
                                <path d="M2 6h4" />
                                <path d="M2 10h4" />
                                <path d="M2 14h4" />
                                <path d="M2 18h4" />
                                <path d="M18.4 2.6a2.17 2.17 0 0 1 3 3L16 11l-4 1 1-4Z" />
                            </svg>
                        </a>

                        {{-- voir --}}
                        <a href="{{ route('enseignant.show', $enseignant) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-eye">
                                <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z" />
                                <circle cx="12" cy="12" r="3" />
                            </svg>
                        </a>



                        {{-- affectation --}}

                        <button
                            wire:click="$dispatch('openModal', { component: 'enseignant.enseignant-bureau-modal', arguments: { enseignant: {{ $enseignant }} }})"
                            class="text-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-package-plus">
                                <path d="M16 16h6" />
                                <path d="M19 13v6" />
                                <path
                                    d="M21 10V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l2-1.14" />
                                <path d="m7.5 4.27 9 5.15" />
                                <polyline points="3.29 7 12 12 20.71 7" />
                                <line x1="12" x2="12" y1="22" y2="12" />
                            </svg>
                        </button>


                        {{-- delete --}}



                        <button
                            wire:click="$dispatch('openModal', { component: 'modals.confirm-delete-modal', arguments: { elementId: {{ $enseignant->id }}, routeName: 'enseignant.destroy' }})"
                            class="text-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-trash-2">
                                <path d="M3 6h18" />
                                <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                <line x1="10" x2="10" y1="11" y2="17" />
                                <line x1="14" x2="14" y1="11" y2="17" />
                            </svg>
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
