@extends('layout')

@section('head')
<!-- enabling only for this page -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css" />
@endsection

@section('content')
<div id="wrapper">
    <div id="page" class="container">
        <h1>Update article</h1>
        <!-- nowadays browsers better understand post and get, if we want to update we have to tweak, so ' method put' -->
    <form method="POST" action="/articles/{{ $article->id }}">
            <!-- prevents requests on other servers faking a request on your server, therefore it generates a validation token in hidden field -->
            @csrf
            @method('PUT')
            <div class="field">
                <label for="title">Title</label>
                <div>
                <input type="text" name="title" id="title" value="{{$article->title}}"/>
                </div>
            </div>
            <div class="field">
                <label for="title">Excerpt</label>
                <div>
                <input type="text" name="excerpt" id="excerpt" value="{{$article->excerpt}}"/>
                </div>

            </div>
            <div class="field">
                <label for="title">Body</label>
                <div>
                <textarea name="body" id="body">{{$article->body}}</textarea>
                </div>
            </div>
            <div>
                <input type="submit" value="submit"/>
            </div>
        </form>
    </div>
</div>
@endsection