<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __(' Nouvelles Acquisitions') }}
        </h2>
    </x-slot>

    <div class="flex justify-center pt-12 mx-auto max-w-7xl">
        {{ Breadcrumbs::render('addstocks') }}
    </div>
    <div class="max-w-screen-lg p-4 mx-auto my-16 bg-gray-50">
        <livewire:acquisition.add-multiple-acquisition>
    </div>
</x-app-layout>