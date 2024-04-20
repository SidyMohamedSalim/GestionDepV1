@extends('admin.archives.base-archive')


@section('action-right')
@endsection

@section('content')
<div class="py-4">
    {{ Breadcrumbs::render('affectations') }}
</div>
<livewire:all-affections />
@endsection
