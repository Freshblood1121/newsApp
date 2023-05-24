@extends('layout.admin')
@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Админка</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar" class="align-text-bottom"></span>
                This week
            </button>
        </div>
    </div>
    <div class="table-responsive">
        <x-alert type="info" message="Hello!"></x-alert>
        <x-alert type="danger" message="Hello!"></x-alert>
        <x-alert type="success" message="Hello!"></x-alert>
        <x-alert type="warning" message="Hello!"></x-alert>
    </div>
@endsection
