<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <table class="w-full text-sm text-left rtl:text-right">
        <thead class="text-xs text-white uppercase bg-primary">
            <tr>
                <th scope="col" class="px-6 py-3">Enseignant</th>
                <th scope="col" class="px-6 py-3">Bureau</th>
                <th scope="col" class="px-6 py-3">Equipement</th>
                <th scope="col" class="px-6 py-3">Fourniture</th>
                <th scope="col" class="px-6 py-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($enseignants as $enseignant)
            <tr class="border-b odd:bg-white">
                <th scope="row" class="px-6 py-4 font-bold">
                    {{ $enseignant->nom }} {{ $enseignant->prenom }}
                </th>
                <td class="px-6 py-4">
                    @if (count($enseignant->bureau) > 0)
                    {{ $enseignant->bureau[0]->designation }}
                    @else
                    <x-icons.remove />
                    @endif
                </td>

                {{-- affiche le nombre d'equipement affecter a cet enseignant --}}
                <td class="px-6 py-4">

                    <span class="flex gap-2 items-center">
                        {{ count($enseignant->equipement) }}
                    </span>
                </td>
                {{-- affiche le nombre de fourniture affecter a cet enseignant --}}
                <td class="px-6 py-4">
                    @php
                    $countFourniture = count($enseignant->fourniture)
                    @endphp
                    <span class="flex gap-2 items-center">
                        {{ count($enseignant->fourniture) }}
                    </span>
                </td>

                <td class="px-6 py-4">
                    <a href="{{ route('enseignant.show', $enseignant) }}">
                        <x-icons.eyes />
                    </a>
                </td>


            </tr>
            @empty
            <div class="flex justify-center items-center w-full h-full">
                <p>Vide !!</p>
            </div>
            @endforelse
        </tbody>
    </table>

    <div>{{ $enseignants->links() }}</div>
</div>