@extends('admin.base')


@section('content')
    <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">

        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                    Grade
                </th>
                <th scope="col" class="px-6 py-3">
                    Bureau
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($enseignants as $enseignant)
                <tr
                    class="border-b odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
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
                            <p class="text-gray-500 hover:cursor-not-allowed">Pas de Bureau</p>
                        @endforelse

                    </td>
                    <td class="flex items-center px-6 py-4 justify-evenly">
                        <a href="{{ route('enseignant.edit', $enseignant) }}"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">

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

                        <x-enseignant.affectation-bureau :enseignant="$enseignant" />

                        {{-- delete --}}
                        <div class="space-y-6 text-red-500 ">
                            <button x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion{{ $enseignant->id }}')">
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

                            <x-modal name="confirm-user-deletion{{ $enseignant->id }}" focusable>
                                <form method="post" action="{{ route('enseignant.destroy', $enseignant) }}" class="p-6">
                                    @csrf
                                    @method('delete')

                                    <h2 class="text-lg font-medium text-gray-900">
                                        {{ __('Voulez-vous Vraiment  Supprimer ?') }}
                                    </h2>

                                    <div class="flex justify-end mt-6">
                                        <x-secondary-button x-on:click="$dispatch('close')">
                                            {{ __('Cancel') }}
                                        </x-secondary-button>

                                        <x-danger-button class="ms-3">
                                            {{ __('Delete') }}
                                        </x-danger-button>
                                    </div>
                                </form>
                            </x-modal>
                        </div>



                    </td>
                </tr>
            @endforeach

        </tbody>

    </table>
    <div class="py-6">{{ $enseignants->links() }}</div>
@endsection
