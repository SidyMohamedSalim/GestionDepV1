<div>
    <button wire:click.prevent='{{ $action }}' @class([' inline-flex items-center px-8 py-2 text-xs font-semibold
        tracking-widest uppercase transition duration-150 ease-in-out border border-transparent rounded-md
        hover:bg-primary focus:bg-primary active:bg-primary focus:outline-none focus:ring-2 focus:ring-primary
        focus:ring-offset-2',"text-white bg-primary"=>$selectedCategorie == $name
        ])>
        {{$slot}}
    </button>
</div>
