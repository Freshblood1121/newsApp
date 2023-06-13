@extends('layout.app')
@section('content')
    <div class="offset-2">
        <h2>Добро пожаловать, {{ Auth::user()->name }}</h2>
        <br>
        @if(Auth::user()->is_admin === true)
        <a href="{{ route('admin.index') }}">Перейти в админку</a>
        @endif
    </div>
@endsection
