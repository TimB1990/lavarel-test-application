@extends('layout')

@section('content')
<div id="wrapper">
    <div id="page" class="container">

        @forelse($articles as $article)
        <div class="content">
            <div class="title">
                <h2>
                    <a href="{{ $article->path() }}">
                        {{ $article->title }}
                    </a>
                </h2>
            </div>

            {!! $article->excerpt !!}
        </div>
        @empty
            <p>no relevant articles</p>
        @endforelse
    </div>
</div>
@endsection