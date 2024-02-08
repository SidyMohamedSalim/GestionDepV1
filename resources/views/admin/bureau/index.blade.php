<x-app-layout>


    <div class="max-w-screen-xl m-6 mx-auto">

        @if (session('success'))
            <div
                class="flex items-center justify-between w-full p-2 px-4 my-4 font-bold text-green-600 rounded-lg bg-gray-50">
                <span>{{ session('success') }}</span>
                <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-check">
                        <path d="M20 6 9 17l-5-5" />
                    </svg></span>
            </div>
        @endif

        {{-- new bureaux --}}


        <div class="flex items-end justify-end my-4">

            <a href="{{ route('bureau.create') }}"
                class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-gray-700 uppercase transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25'>
                +
            </a>
        </div>

        {{-- listing bureaux --}}

        <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">

            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Numero
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Designation
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Capacite
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Date Acquisition
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bureaux as $bureau)
                    <tr
                        class="border-b odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
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
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">


                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-notebook-pen">
                                    <path d="M13.4 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-7.4" />
                                    <path d="M2 6h4" />
                                    <path d="M2 10h4" />
                                    <path d="M2 14h4" />
                                    <path d="M2 18h4" />
                                    <path d="M18.4 2.6a2.17 2.17 0 0 1 3 3L16 11l-4 1 1-4Z" />
                                </svg>
                            </a>

                            {{-- delete --}}
                            <div class="space-y-6 text-red-500 ">
                                <button x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'confirm-bureau-deletion{{ $bureau->id }}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2">
                                        <path d="M3 6h18" />
                                        <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                        <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                        <line x1="10" x2="10" y1="11" y2="17" />
                                        <line x1="14" x2="14" y1="11" y2="17" />
                                    </svg>
                                </button>

                                <x-modal name="confirm-bureau-deletion{{ $bureau->id }}" focusable>
                                    <form method="post" action="{{ route('bureau.destroy', $bureau) }}" class="p-6">
                                        @csrf
                                        @method('delete')

                                        <h2 class="text-lg font-medium text-gray-900">
                                            {{ __('Voulez-vous Vraiment Supprimer ?') }}
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
        <div class="py-6">{{ $bureaux->links() }}</div>

    </div>



    </div>

</x-app-layout>
