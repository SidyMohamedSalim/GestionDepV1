@extends('admin.Materiel.base-materiel')


@section('content')
<div class="py-4">
    {{ Breadcrumbs::render('materiels') }}
</div>
<div>
    <livewire:materiel.materiel-livewire />
</div>
@endsection