@extends('admin.base-enseignant')


@section('content')
<div class="py-4">
    {{ Breadcrumbs::render('enseignants') }}
</div>
<livewire:enseignant-livewire />
@endsection