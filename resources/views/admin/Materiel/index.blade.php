@extends('admin.Materiel.base-materiel')


@section('content')
<livewire:materiel.materiel-livewire :categorie="$categorie" />
@endsection
