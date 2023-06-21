@extends('layout.app')
@section('content')
    <div class="offset-2">
        <h2>Добро пожаловать, {{ Auth::user()->name }}</h2>
        <br>
        @if(Auth::user()->avatar)
            <img src="{{Auth::user()->avatar}}" style="width: 150px" alt="avatar">
        @endif
        @if(Auth::user()->is_admin === true)
            <br><br>
                <a href="{{ route('admin.index') }}" type="button" class="btn btn-dark">
                    Перейти в админку
                </a>
        @endif
    </div>
@endsection
