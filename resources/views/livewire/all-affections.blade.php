<div>

    @php
    $isInventoriee = $categorie == 'Equipement';
    @endphp


    <div class="py-4 flex justify-between items-center">
        <div class="flex gap-4 items-center my-6">

        </div>
        <div class="mt-4">
            <x-input-label for="max_by_page" :value="__('Total par Page')" />

            <x-text-input min="0" id="max_by_page" class="block w-full mt-1" type='number'
                wire:model.live.debounce.100ms='perPage' value="{{ old('max_by_page', $perPage) }}" />

        </div>
    </div>

    {{-- filter imprimante and pc --}}
    @if ($categorie == 'Equipement')
    <div class="py-4">
        <div class="flex gap-2 items-center">
            <x-tool-filter fieldname="Imprimante" :selectedValue="$filterByImprimanteOrOrdinateur" />
            <x-tool-filter fieldname="Ordinateur" :selectedValue="$filterByImprimanteOrOrdinateur" />
        </div>
    </div>
    @endif

    <table class="w-full text-sm text-left rtl:text-right">

        <thead class="text-xs text-white uppercase bg-primary">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Materiel
                </th>
                <th scope="col" class="px-6 py-3">
                    Enseignant
                </th>
                <th scope="col" class="px-6 py-3">
                    Quantité
                </th>
                <th scope="col" class="px-6 py-3">
                    Date d'affectation
                </th>
                {{-- <th scope="col" class="px-6 py-3">
                    Actions
                </th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr class="border-b odd:bg-white">
                <th scope="row" class="px-6 py-4 font-bold whitespace-nowrap">
                    {{ $item['designation'] }}
                </th>
                <td class="px-6 py-4">
                    {{ $item['nom'] }} {{ $item['prenom'] }}
                </td>
                <td class="px-6 py-4">

                    {{ $item['quantite'] }}
                </td>
                <td class="px-6 py-4">
                    {{
                    App\utils\DataGenerator::FormateDate($item['date_affectation']) }}
                </td>
                {{-- <td class="px-6 py-4">
                    <x-icons.eyes />
                </td> --}}
            </tr>
            @endforeach
        </tbody>

    </table>
    <div class="py-6">{{ $data->links() }}</div>

</div>
