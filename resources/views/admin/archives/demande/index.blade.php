@extends('admin.archives.base-archive')


@section('action-right')
<x-ligth-button :href="route('archives.demande.add')">
    + Nouvelle demande
</x-ligth-button>

@endsection


@section('content')
<div class="py-4">
    {{ Breadcrumbs::render('demandes') }}
</div>

{{-- contenu --}}

<livewire:materiels.demandes.demande-livewire />
@endsection
