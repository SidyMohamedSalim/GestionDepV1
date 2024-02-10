   <div class="space-y-6 ">
       <button x-data="" class="text-green-500"
           x-on:click.prevent="$dispatch('open-modal', 'affection-enseignant{{ $bureau->id }}')">
           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
               stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
               class="lucide lucide-user-round-plus">
               <path d="M2 21a8 8 0 0 1 13.292-6" />
               <circle cx="10" cy="8" r="5" />
               <path d="M19 16v6" />
               <path d="M22 19h-6" />
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

                   @error('enseignants')
                       <p class="py-2 text-red-500"> {{ $message }}</p>
                   @enderror

                   @foreach ($enseignants as $enseignant)
                       <div class="flex items-center justify-between hover:bg-gray-50">
                           <label class="flex-1 py-2 font-bold text-black"
                               for="{{ $enseignant->id }}">{{ $enseignant->nom }}
                               {{ $enseignant->prenom }}</label>
                           <input type="checkbox" id="{{ $enseignant->id }}" name="enseignants[]"
                               value="{{ $enseignant->id }}" @checked($enseignantsId->contains($enseignant->id))>
                       </div>
                   @endforeach
               </div>
               <div>
                   <button class="px-4 py-1 text-white bg-black rounded-lg" type="submit">Affecter Enseignants</button>
               </div>
           </form>
       </x-modal>
   </div>
