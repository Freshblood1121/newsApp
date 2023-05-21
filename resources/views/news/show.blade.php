@extends('layout.main')
@section('content')
<div class="row g-5">
        <div class="col-md-8">
            <h3 class="pb-4 mb-4 fst-italic border-bottom">From the Firehose</h3>

            <div class="blog-post">
                <h2 class="blog-post-title mb-1">{{$news['title']}}</h2>
                <p class="blog-post-meta">{{$news['created_at']}}<a href="#">{{$news['author']}}</a></p>
                <p>{{$news['description']}}</p>
                <hr>
            </div>
        </div>

        <div class="col-md-4">
            <div class="position-sticky" style="top: 2rem;">
                <div class="p-4 mb-3 bg-body-tertiary rounded">
                    <h4 class="fst-italic">About</h4>
                    <p class="mb-0">Customize this section to tell your visitors a little bit about your publication, writers, content, or something else entirely. Totally up to you.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
