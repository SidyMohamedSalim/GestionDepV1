<x-app-layout>

    <div class="flex justify-center py-12 mx-auto max-w-7xl">
        {{ Breadcrumbs::render('bureauajoutenseignant',$bureau) }}
    </div>
    <!-- Session Status -->
    <div class="justify-center max-w-screen-xl mx-auto">


        <form method="post" action="{{ route('affecter_enseignants_bureau', $bureau) }}" class="px-6 pb-10">
            @csrf
            @method('put')
            @php
            $enseignantsId = $bureau->enseignant->pluck('id');
            @endphp
            <div class="p-4 pb-6 my-4 bg-white">
                @error('enseignants')
                <p class="py-2 text-red-500"> {{ $message }}</p>
                @enderror
                <div class="grid gap-2 md:grid-cols-2">
                    @foreach ($enseignants as $enseignant)
                    <div class="flex items-center justify-start gap-2 mx-2 hover:bg-gray-50">
                        <input type="checkbox" id="{{ $enseignant->id }}" name="enseignants[]"
                            value="{{ $enseignant->id }}" @checked($enseignantsId->contains($enseignant->id))>
                        <label class="flex-1 py-2 font-bold text-black" for="{{ $enseignant->id }}">{{ $enseignant->nom
                            }}
                            {{ $enseignant->prenom }}</label>
                    </div>
                    @endforeach
                </div>
            </div>
            <div>
                <button class="px-4 py-1 text-white bg-black rounded-lg" type="submit">Affecter Enseignants</button>
            </div>
        </form>
    </div>
</x-app-layout>