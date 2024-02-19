   <div class="mt-4" x-data="{ add: @entangle('add') }">
       {{-- choisir parmis les {{ $name }}s --}}
       <div x-show="!add">

           <p @click="add=true"
               class='inline-flex items-center self-end px-4 py-2 text-xs font-semibold tracking-widest uppercase duration-150 ease-in-out rounded-md cursor-pointer transpition text-primary focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 disabled:opacity-25'>
               +new
           </p>
       </div>

       {{-- creer  les {{ $name }}s --}}
       <div x-show="add">
           <x-text-input id="{{ $name }}" class="block w-full mt-1" type="text" wire:model.defer="content"
               name="{{ $name }}" value="{{ old($name) }}" autofocus autocomplete="{{ $name }}" />

           @error('content')
               <p class="text-xs text-red-500">{{ $message }}</p>
           @enderror

           <div class="flex items-start justify-start gap-2">
               <button x-on:click.prevent="$wire.addOption()"
                   class='inline-flex items-center px-4 py-2 mt-2 text-xs font-semibold tracking-widest uppercase duration-150 ease-in-out bg-white border rounded-md shadow-sm transpition text-primary hover:border-primary focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 disabled:opacity-25'>
                   Add
               </button>
               <p @click="add=false"
                   class='inline-flex items-center self-end px-4 py-2 text-xs font-semibold tracking-widest uppercase duration-150 ease-in-out rounded-md cursor-pointer transpition text-primary focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 disabled:opacity-25'>
                   x
               </p>
           </div>

       </div>
       <script>
           window.addEventListener('refresh-page', event => {
               window.location.reload(false);
           })
       </script>
   </div>
