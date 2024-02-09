   <div class="space-y-6  ">
       <button x-data="" class="text-green-500"
           x-on:click.prevent="$dispatch('open-modal', 'affection-enseignant{{ $bureau->id }}')">
           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
               stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
               class="lucide lucide-package-plus">
               <path d="M16 16h6" />
               <path d="M19 13v6" />
               <path
                   d="M21 10V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l2-1.14" />
               <path d="m7.5 4.27 9 5.15" />
               <polyline points="3.29 7 12 12 20.71 7" />
               <line x1="12" x2="12" y1="22" y2="12" />
           </svg>
       </button>

       <x-modal name="affection-enseignant{{ $bureau->id }}" focusable>
           <form method="post" action="{{ route('affecter_enseignants_bureau', $bureau) }}" class="p-6 pb-10">
               @csrf
               @method('put')
               @php
                   $enseignantsId = $bureau->enseignant->pluck('id');
               @endphp
               <div class="pb-6">
                   @foreach ($enseignants as $enseignant)
                       <div class="flex justify-between items-center hover:bg-gray-50">
                           <label class="text-black font-bold py-2 flex-1"
                               for="{{ $enseignant->id }}">{{ $enseignant->nom }}
                               {{ $enseignant->prenom }}</label>
                           <input type="checkbox" id="{{ $enseignant->id }}" name="enseignants[]"
                               value="{{ $enseignant->id }}" @checked($enseignantsId->contains($enseignant->id))>
                       </div>
                   @endforeach
               </div>
               <div>
                   <button class="bg-black rounded-lg px-4 py-1 text-white" type="submit">Affecter Enseignants</button>
               </div>
           </form>
       </x-modal>
   </div>
