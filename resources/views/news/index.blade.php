@extends('layout.main')
@section('content')
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse($newsList as $news)
            <div class="col shadow-sm p-3 mb-1 bg-white rounded">
                <div class="card h-100">
                    <img src="{{ Storage::disk('public')->url($news->image) }}" class="rounded img-fluid" alt="imgPosts">
                    <div class="card-body">
                        <a class="icon-link icon-link-hover text-decoration-none"
                           style="--bs-link-hover-color-rgb: 220,20,60;">
                            <h5 class="card-title text-dark">{{ $news->title }}</h5>
                        </a>
                        <a class="icon-link icon-link-hover text-decoration-none stretched-link"
                           href="{{ route('news.show', ['news' => $news]) }}">
                        </a>
                        <p class="card-text text-dark-emphasis">{!!  $news->description  !!}</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-body-secondary">Добавлено: {{ $news->created_at }}</small>
                    </div>
                </div>
            </div>

        @empty
            <h2>Новостей нет.</h2>
        @endforelse
    </div>
    <br>
    {{ $newsList->links() }}
@endsection
