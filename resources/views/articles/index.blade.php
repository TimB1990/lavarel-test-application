@extends('layout')

@section('content')

<div id="wrapper">
<div id="page" class="container">
@foreach($articles as $article)
<div id="content">
    <div class="title">
    <h2>
    <!-- laravel knows how to fetch the correct keyname -->
    <a href="{{ $article->path() }}">
            {{ $article->title }}</a>
    </h2>
    <p><img src="images/banner.jpg" alt="" class="image image-full" /> </p>
</div>
</div>
@endforeach
</div>
</div>
@endsection

<!-- every location where you hardcoded a url need to be updated -->
<!-- therefore use a named route. So instead of hardcoded /articles/article->id
    do route('articles.show') not nessesary if you don't change paths very often
-->