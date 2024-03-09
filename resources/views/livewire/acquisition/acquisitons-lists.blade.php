<div>

    @for ($i = 0; $i < $nombre_acquisitions ; $i++) <div class="grid grid-cols-3 gap-3">
        <div>
            <select name="acquisition[{{ $i }}][materiel_id]"
                class="w-full rounded-md shadow-sm border-primary-300 focus:border-primary focus:ring-primary">
                <option disabled selected value="">Selectionner materiel</option>
                @foreach ($materiels as $materiel)
                <option value="{{ $materiel->id }}">{{ $materiel->designation }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('acquisition.'.$i.'.materiel_id')" class="mt-2" />
        </div>
        <div>
            <input type="number" name="acquisition[{{ $i }}][quantite]"
                class="block w-full mt-1 rounded-md shadow-sm border-primary-300 focus:border-primary focus:ring-primary"
                placeholder="Quantite" />
            <x-input-error :messages="$errors->get('acquisition.'.$i.'.quantite')" class="mt-2" />
        </div>
        <div>
            <textarea name="carateristiques"
                class="w-full rounded-md shadow-sm border-primary-300 focus:border-primary focus:ring-primary"
                placeholder="commentaire"></textarea>

        </div>
</div>
@endfor

<div class="flex justify-end my-6">
    <button wire:click.prevent='increment'
        class="'inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest uppercase duration-150 ease-in-out bg-white border rounded-md shadow-sm transpition bg-wthite hover:border-primary focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 disabled:opacity-25">+</button>
</div>
</div>