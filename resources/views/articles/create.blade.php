@extends('layout')

@section('head')
<!-- enabling only for this page -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css" />
@endsection

@section('content')
<div id="wrapper">
    <div id="page" class="container">
        <h1>New article</h1>
        <form method="POST" action="/articles">
            <!-- prevents requests on other servers faking a request on your server, therefore it generates a validation token in hidden field -->
            @csrf
            <div class="field">
                <label for="title">Title</label>
                <div>
                <!-- the old('title') keeps provided data after error by laravel -->
                <input 
                    style="@error('title') border:1px solid red; @enderror" 
                    type="text" 
                    name="title" 
                    id="title"
                    value="{{ old('title') }}"
                />

                @error('title')
                    <p style="color:red">{{ $errors->first('title')}}</p>
                @enderror

                </div>
            </div>
            <div class="field">
                <label for="excerpt">Excerpt</label>
                <div>
                    <input 
                        style="@error('excerpt') border:1px solid red; @enderror" 
                        type="text" 
                        name="excerpt" 
                        id="excerpt"
                        value="{{ old('excerpt') }}"
                    />

                    @error('excerpt')
                        <p style="color:red">{{ $errors->first('excerpt')}}</p>
                    @enderror
                
                </div>
            </div>
            <div class="field">
                <label for="body">Body</label>
                <div>
                    <textarea 
                        style="@error('body') border:1px solid red; @enderror" 
                        name="body" 
                        id="body"
                        value="{{ old('body') }}"
                    ></textarea>
                    @error('body')
                        <p style="color:red">{{ $errors->first('body')}}</p>
                    @enderror
                </div>
            </div>
            <div>
                <input type="submit" value="submit"/>
            </div>
            <div class="field">
                <label class="label" for="tag">Tags</label>

                <div class="control">
                    <select name="tags[]" multiple>
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">
                                {{ $tag->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('tags')
                        <p style="color:red;">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </form>
    </div>
</div>
@endsection