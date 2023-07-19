@extends('layout.admin')
@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список новостей</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{route('admin.news.create')}}" type="button" class="btn btn-success">Добавить новость</a>
        </div>
    </div>
    @include('inc.message')
    <div class="table-responsive">
        <table class="table table-sm table-hover">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Категория</th>
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
                    <td>{{$news->categories->map(fn($item) => $item->title)->implode(',')}}</td>
                    <td>{{$news->title}}</td>
                    <td>{{$news->author}}</td>
                    <td>{{$news->status}}</td>
                    <td>{!! $news->description !!}</td>
                    <td>{{$news->created_at}}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <a href="{{route('admin.news.edit', ['news' => $news])}}"
                               class="btn btn-primary">Изменить</a> &nbsp
                            <a href="javascript:;" rel="{{$news->id}}" class="btn btn-danger delete">Удалить</a>
                        </div>
                    </td>
                </tr>

            @empty
                <td colspan="7">Записей нет</td>
            @endforelse
            </tbody>
        </table>
    </div>
    {{$newsList->links() }}
    @push('js')
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function (){
                let elements = document.querySelectorAll(".delete");
                elements.forEach(function (e){
                    e.addEventListener("click", function (){
                    const id = this.getAttribute('rel');
                    if(confirm(`Подтверждаете удаление записи с #ID = ${id}`)) {
                        send(`/admin/news/${id}`).then(()=>{
                            location.reload();
                        });
                    } else {
                        alert("Удаление отменено");
                    }
                });
                });
            });

            async function send(url) {
                let response =  await fetch(url, {
                    method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    });
                let result = await response.json();
                return result.ok;
            }
        </script>

    @endpush
@endsection
