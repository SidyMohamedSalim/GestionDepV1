@extends('admin.Materiel.base-materiel')


@section('content')

<div>

    <livewire:materiel.materiel-livewire :categorie="$categorie" />
</div>
@endsection
