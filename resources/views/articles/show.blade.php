@extends('layout')

@section('content')

<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
			<div class="title">
                <h2>{{ $article->title }}</h2>
		    </div>
    </div>
    
    {{ $article->body }}

</div>
@endsection