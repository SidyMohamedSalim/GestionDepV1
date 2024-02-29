<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Informations sur l'enseignant Vacataire <span class="font-extrabold text-primary">{{ $enseignant->nom }} {{
                $enseignant->prenom }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-3xl">
                    <section>
                        {{-- header --}}
                        <header class="mb-4">
                            <h2 class="text-xl font-extrabold text-primary">
                                {{ __('Identité') }}
                            </h2>
                        </header>

                        {{-- content --}}
                        <div class="flex flex-col w-full gap-2 mt-4">
                            <div class="flex items-center justify-between w-full">
                                <p><span class="font-extrabold">Nom : </span> {{ $enseignant->nom }}</p>
                                <p><span class="font-extrabold">Prenom : </span> {{ $enseignant->prenom }}</p>
                            </div>
                            <div class="flex items-center justify-between w-full">
                                <p><span class="font-extrabold">Email : </span> {{ $enseignant->email }}</p>
                                <p><span class="font-extrabold">Status : </span> @if ($enseignant->active)
                                    Actif
                                    @else
                                    Non Actif
                                    @endif</p>
                            </div>
                            <div class="flex items-center justify-between w-full">
                                <p><span class="font-extrabold">Date de Debut : </span> {{
                                    $enseignant->date_debut }}
                                </p>
                                <p><span class="font-extrabold">Date Fin : </span>
                                    {{ $enseignant->date_fin }}
                                </p>
                            </div>


                        </div>
                    </section>
                </div>
            </div>


        </div>
    </div>
</x-app-layout>