<x-app-layout>



    <div class="max-w-screen-xl m-6 mx-auto">
        <div class="py-4">
            {{ Breadcrumbs::render('stocks') }}
        </div>
        <x-succes-message />
        <livewire:materiels.stocks />
    </div>


</x-app-layout>
