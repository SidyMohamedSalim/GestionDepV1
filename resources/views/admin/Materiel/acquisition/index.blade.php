<x-app-layout>



    <div class="max-w-screen-xl m-6 mx-auto">
        <div class="py-4">
            {{ Breadcrumbs::render('stocks') }}
        </div>
        <x-success-message />
        <livewire:materiels.acquisition-materiel-table />
    </div>


</x-app-layout>