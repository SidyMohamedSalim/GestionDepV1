<div>

    @php
    $isInventoriee = $categorie == 'Equipement';
    @endphp






    <div class="py-4">
        <div class="flex gap-4 items-center my-6">
            <button wire:click.prevent="changeCategorie('Equipement')" @class(['inline-flex items-center px-8 py-2
                text-xs font-semibold tracking-widest uppercase transition duration-150 ease-in-out border
                border-transparent rounded-md hover:bg-primary focus:bg-primary active:bg-primary focus:outline-none
                focus:ring-2 focus:ring-primary focus:ring-offset-2 ',"text-white bg-primary"=>$categorie == "Equipement" ])>Inventoriée </button>
            <button wire:click.prevent=' changeCategorie("Fourniture")' @class([' inline-flex items-center px-8 py-2
                text-xs font-semibold tracking-widest uppercase transition duration-150 ease-in-out border
                border-transparent rounded-md hover:bg-primary focus:bg-primary active:bg-primary focus:outline-none
                focus:ring-2 focus:ring-primary focus:ring-offset-2',"text-white bg-primary"=>$categorie == 'Fourniture'
                ])>
                Non Inventoriée
            </button>
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
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($enseignantsAffectations as $enseignantAffectations)
            @php
            $affectations = $isInventoriee == true ? $enseignantAffectations->equipement :
            $enseignantAffectations->fourniture;
            @endphp
            @foreach ($affectations as $affectation)
            <tr class="border-b odd:bg-white">
                <th scope="row" class="px-6 py-4 font-bold whitespace-nowrap">
                    {{-- {{ $affectation->materiel->designation }} --}}
                </th>
                <td class="px-6 py-4">
                    {{ $enseignantAffectations->nom }} {{ $enseignantAffectations->prenom }}
                </td>
                <td class="px-6 py-4">
                    {{ $affectation->quantite }}
                </td>
                <td class="px-6 py-4">
                    {{ $affectation->date_affectation }}
                </td>
                <td class="px-6 py-4">
                    <x-icons.eyes />
                </td>
            </tr>
            @endforeach

            @endforeach
        </tbody>

    </table>
    {{-- <div class="py-6">{{ $equipements->links() }}</div> --}}


</div>