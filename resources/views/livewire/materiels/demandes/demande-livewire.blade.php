<div>


    <div class="my-4 text-xl font-extrabold">
        <h1>Toutes les demandes</h1>
    </div>

    <div>
        @foreach ($demandes as $demande )
        <div class="mb-16 first:mt-8">
            <div class="bg-gray-200 border-b">
                <div class="flex justify-between px-6 py-4">
                    <p>
                        <span class="font-extrabold">Titre : </span>{{ $demande->titre }}
                    </p>
                    <p>
                        <span class="font-extrabold">Date de la demande : </span>{{$demande->date_demande }}
                    </p>
                    <div class="flex gap-2">
                        <p class="font-extrabold">Statut : </p>
                        @if ($startEditStatusDemande == false)
                        <p class="flex gap-2">
                            @if ($demande->status == 'pending')
                            <x-icons.load /> En cours
                            @elseif ($demande->status == 'reset')
                            <x-icons.remove /> Annulé
                            @else
                            <x-icons.valid /> Terminé
                            @endif
                        </p>
                        <button wire:click.prevent='changestartEditStatusDemande()' class="text-xs">
                            <x-icons.pencil />
                        </button>
                        @else
                        <select wire:model.defer='status'
                            class="text-xs bg-transparent border-none outline-none focus:border-none hover:border-none">
                            <option value="pending" @checked($demande->status == 'pending')>
                                En cours
                            </option>
                            <option value="finish" @checked($demande->status == 'finish')>
                                Terminé
                            </option>
                            <option value="reset" @checked($demande->status == 'reset')>
                                Annulé
                            </option>

                        </select>

                        <button wire:click.prevent="changeStatut('{{ $demande->id }}')" class="text-xs">
                            <x-icons.send />
                        </button>
                        @endif

                    </div>
                    {{-- Actions --}}
                    <div class="flex gap-2">
                        <x-modal-alpine title="suppression de demande" :key="$demande->id"
                            name="materiel de {{ $demande->id }}">
                            <x-slot name="icon">
                                <x-icons.delete />
                            </x-slot>
                            @csrf
                            <p class="my-4 text-lg font-bold text-center">Voulez-vous vraiment supprimer la demande avec
                                le titre : <span class="text-primary">{{ $demande->titre }}</span>
                                ?</p>
                            <button wire:click.prevent='deleteDemande("{{ $demande->id }}")'
                                class="px-6 py-2 mt-4 mb-4 text-white bg-red-500 rounded-lg cursor-pointer hover:underline">
                                Valider</button>
                        </x-modal-alpine>
                    </div>
                </div>

            </div>
            <table class="w-full text-sm text-left rtl:text-right">

                <thead class="text-xs text-white uppercase bg-secondary">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Designation
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Quantite
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Prix Unitaire (DH)
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Details
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($demande->items as $item)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4">
                        </th>
                        <th scope="row" class="px-6 py-4 font-bold">
                            {{ $item->designation }}
                        </th>
                        <td class="px-4 py-2">
                            {{ $item->quantite }}
                        </td>
                        <td class="px-4 py-2">
                            {{ $item->prix_unitaire }}
                        </td>
                        <td class="px-4 py-2">
                            {{ $item->description }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endforeach

        <div>
            {{ $demandes->links() }}
        </div>
    </div>

</div>