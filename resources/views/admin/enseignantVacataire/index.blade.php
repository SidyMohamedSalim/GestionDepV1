@extends('admin.base-enseignant')

@section('content')
<div class="py-4">
    {{ Breadcrumbs::render('vacataires') }}
</div>
<livewire:enseignant-vacataire-livewire />
@endsection