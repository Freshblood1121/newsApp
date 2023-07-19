@extends('layout.admin')
@section('content')

    @if(in_array('news', $news))
        <br>
        <h3 class="offset-4">Parsing completed!</h3>
        <br>
        {{--  Тут должны быть новости на выбор  --}}
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 g-4">
                {{--                @foreach($news as $n)--}}
                {{--                <div class="col">--}}
                {{--                    <div class="card mb-3">--}}
                {{--                        <div class="card-body">--}}
                {{--                            <h5 class="card-title">{{ $news[0]['news'][$n]['title'] }}</h5>--}}
                {{--                            <p class="card-text">{{ $n['description'] }}</p>--}}
                {{--                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">--}}
                {{--                                <a href="{{ $news[0]['news'][0]['link'] }}" class="btn btn-primary">Читать полностью</a>--}}
                {{--                                <a href="#" class="btn btn-success">Добавить на сайт</a>--}}
                {{--                                <a href="#" class="btn btn-danger">Удалить</a>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                        <div class="card-footer text-body-secondary">--}}
                {{--                            {{ $n['pubDate'] }}--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                {{--                @endforeach--}}
            </div>
        </div>
        <br>
    @else
        <br>
        <h3 class="offset-4">News not found...</h3>
        <br>
    @endif
@endsection
