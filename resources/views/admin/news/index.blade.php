@extends('layout.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список новостей</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href ="{{route('admin.news.create')}}"  type="button" class="btn btn-secondary">Добавить новость</a>
        </div>
    </div>
        <div class="table-responsive">
            <table class="table table-sm table-hover">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Заголовок</th>
                    <th>Автор</th>
                    <th>Статус</th>
                    <th>Описание</th>
                    <th>Дата добавления</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @forelse($newsList as $news)
                    <tr>
                        <td>{{$news->id}}</td>
                        <td>{{$news->title}}</td>
                        <td>{{$news->author}}</td>
                        <td>{{$news->status}}</td>
                        <td>{{$news->description}}</td>
                        <td>{{$news->created_at}}</td>
                        <td><a href="{{route('admin.news.edit', ['news' => $news])}}">Изм.</a> &nbsp; <a href="" style="color: red;">Уд.</a></td>
                    </tr>
                @empty
                    <td colspan="7">Записей нет</td>
                @endforelse
                </tbody>
            </table>
        </div>
@endsection
