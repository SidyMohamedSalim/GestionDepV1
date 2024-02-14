<div>
    <table class="w-full text-sm text-left">

        <thead class="text-xs text-white uppercase bg-primary ">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nom
                </th>
                <th scope="col" class="px-6 py-3">
                    Prenom
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Debut
                </th>
                <th scope="col" class="px-6 py-3">
                    Fin
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($enseignants as $enseignant)
                <tr class="border-b odd:bg-white">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $enseignant->nom }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $enseignant->prenom }}
                    </td>
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

                        <a href="{{ route('vacataire.show', $enseignant) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-eye">
                                <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z" />
                                <circle cx="12" cy="12" r="3" />
                            </svg>
                        </a>


                        <button
                            wire:click="$dispatch('openModal', { component: 'modals.confirm-delete-modal', arguments: { elementId: {{ $enseignant->id }}, routeName: 'vacataire.destroy' }})"
                            class="text-red-500">
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
            @endforeach
        </tbody>
    </table>
    <div class="py-6">{{ $enseignants->links() }}</div>
</div>
