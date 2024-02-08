   <div class="space-y-6 text-green-500 ">
       <button x-data=""
           x-on:click.prevent="$dispatch('open-modal', 'affection-bureau{{ $enseignant->id }}')">{{ __('Affecter Bureau') }}</button>





       <x-modal name="affection-bureau{{ $enseignant->id }}" focusable>
           <form method="post" action="{{ route('affecter_bureau_enseignant', $enseignant) }}" class="p-6">
               @csrf
               @method('post')

               <h2 class="text-lg font-medium text-gray-900">
                   {{ __('Selectionner un bureau') }}
               </h2>

               <div class="flex flex-col gap-2 p-4 ">

                   @if (session('bureau_id'))
                       <p class="text-red-500">{{ session('bureau_id') }}</p>
                   @endif
                   @php
                       $bureauxId = $enseignant->bureau->pluck('id');
                   @endphp
                   @foreach ($bureaux as $bureau)
                       <div class="grid space-y-3 ">
                           <div class="relative flex items-start">
                               <div class="flex items-center h-5 mt-1">
                                   <input id="{{ $bureau->id }}" name="bureau_id" type="radio"
                                       value="{{ $bureau->id }}" @checked($bureauxId->contains($bureau->id))
                                       class="text-blue-600 border-gray-200 rounded-full focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                       aria-describedby="hs-radio-delete-description">
                               </div>
                               <label for="{{ $bureau->id }}" class="ms-3">
                                   <span class="block text-sm font-bold text-black">{{ $bureau->designation }}</span>
                                   <span id="bureau_desc"
                                       class="block text-sm text-gray-600 dark:text-gray-500">{{ $bureau->numero_bureau }}</span>
                               </label>
                           </div>
                       </div>
                   @endforeach
               </div>


               <div class="flex justify-end mt-6">
                   <x-secondary-button x-on:click="$dispatch('close')">
                       {{ __('Annuler') }}
                   </x-secondary-button>

                   <button type="submit" class="ms-3">
                       {{ __('Affecter') }}
                   </button>
               </div>
           </form>
       </x-modal>
   </div>
