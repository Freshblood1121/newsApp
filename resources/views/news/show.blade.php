@extends('layout.main')
@section('content')
    <div class="row g-5">
        <div class="col-md-8">
            <div class="blog-post">
                <h3 class="pb-4 mb-4 fst-italic border-bottom">{{ $news->title }}</h3>
                <img src="{{ Storage::disk('public')->url($news->image) }}" style="width: 600px" alt="imgPosts">
                <p>{!! $news->description !!}</p>
                <p class="blog-post-meta">Создано - {{ $news->created_at }}</p>
                <hr>
                <a href="{{ route('news') }}" class="btn btn-outline-primary">
                    Вернуться
                </a>
            </div>

        </div>

        <div class="col-md-4">
            <div class="position-sticky" style="top: 2rem;">
                <div class="p-4 mb-3 bg-body-tertiary rounded">
                    <h4 class="fst-italic"><a href="#">{{ $news->author }}</a></h4>
                    <p class="mb-0">Customize this section to tell your visitors a little bit about your publication,
                        writers, content, or something else entirely. Totally up to you.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
