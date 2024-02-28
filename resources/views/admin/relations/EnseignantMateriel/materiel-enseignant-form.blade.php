<x-app-layout>

    <div class="max-w-screen-xl mx-auto mt-10">


        <h1 class="py-6 text-xl text-center">Affection de materiel a l'enseignant <span class="font-extrabold">{{
                $enseignant->nom }} {{
                $enseignant->prenom
                }}</span> Avec
            l'email <span class="font-extrabold">{{$enseignant->email }}</span></h1>
        <div class="border-b odd:bg-white">
            <form method="post" action="{{ route('materiel_enseignant.create') }}" class="mt-4">
                @csrf
                {{-- mteriel acquisition --}}
                <div class="mt-4">
                    <x-input-label for="type" :value="__('Materiel de ?')" />

                    <select name="type"
                        class="w-full rounded-md shadow-sm border-primary-300 focus:border-primary focus:ring-primary">
                        @foreach ($acquisitions as $acquisition )
                        <option value="{{ $acquisition->id }}">
                            <div class="">
                                <p>Designation : {{ $acquisition->materiel->designation }}</p>
                                <p class="mx-16">Quantite: {{ $acquisition->quantite }}</p>
                            </div>
                        </option>
                        @endforeach

                    </select>

                    <x-input-error :messages="$errors->get('type')" class="mt-2" />
                </div>

                <div class="grid gap-4 md:grid-cols-2">

                </div>

                <td class="flex items-center justify-end mt-4">
                    <x-primary-button type='submit' class="ms-3">
                        {{ __('Affecter') }}
                    </x-primary-button>
                </td>

            </form>
        </div>
    </div>
</x-app-layout>