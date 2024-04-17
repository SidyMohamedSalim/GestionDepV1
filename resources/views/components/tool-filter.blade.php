<div>
    <p. wire:click="changeImprimanteOrPcValue('{{ $fieldname }}')" href="" @class(["cursor-pointer inline-flex border-2
        items-center px-4 py-2 text-xs font-semibold tracking-widest text-primary hover:text-white uppercase rounded-md
        border transition duration-150 ease-in-out hover:bg-primary active:bg-primary focus:outline-none
        focus:border-primary focus:ring focus:ring-primary-dark disabled:opacity-25","bg-primary text-white"=>
        $fieldname==$selectedValue])>
        {{ $fieldname ?? $slot }}
    </p.>
</div>