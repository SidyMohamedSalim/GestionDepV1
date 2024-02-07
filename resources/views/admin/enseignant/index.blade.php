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
                        <a href="{{ route('enseignant.edit', $enseignant) }}"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>


                        <div class="space-y-6 text-red-500 ">
                            <button x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">{{ __('Delete') }}</button>

                            <x-modal name="confirm-user-deletion" focusable>
                                <form method="post" action="{{ route('enseignant.destroy', $enseignant) }}" class="p-6">
                                    @csrf
                                    @method('delete')

                                    <h2 class="text-lg font-medium text-gray-900">
                                        {{ __('Are you sure you want to delete ?') }}
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
@endsection
