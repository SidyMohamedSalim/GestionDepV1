<x-app-layout>


    <div class="max-w-screen-xl m-6 mx-auto">
        <x-succes-message />
    </div>
    <div class="max-w-screen-xl px-6 py-4 mx-auto">
        {{ Breadcrumbs::render('bureaux') }}
    </div>
    <livewire:bureau-livewire />

</x-app-layout>
