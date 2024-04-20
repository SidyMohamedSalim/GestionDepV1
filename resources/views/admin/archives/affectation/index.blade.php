<x-app-layout>



    <div class="m-10 mx-auto max-w-screen-xl">
        <div class="my-6">
            <x-succes-message />
        </div>
        <div class="py-4">
            {{ Breadcrumbs::render('affectations') }}
        </div>

        <livewire:all-affections />
    </div>

</x-app-layout>
