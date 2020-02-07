<?php

Route::get('/','PagesController@home');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/test', function() {
    $name = request('name');

    return view('test', [
        'name' => $name
    ]);
});

/* route with wildcard named '$post'
Route::get('/posts/{post}', function($post) {
    $posts = [
        'my-first-post' => 'this is my first post',
        'my-second-post' => 'this is my second post'
    ];

    if(! array_key_exists($post,$posts)){
        abort(404, 'Sorry that post was not found.');
    }

    return view('post', [
        'post' => $posts[$post]
    ]);
});*/

Route::get('/posts/{post}', 'PostsController@show');

Route::get('/contact', function(){
    return view('contact');
});

Route::get('/about', function(){

    // $article = App\Article::paginate(2);
    // $article = App\Article::take(2);
    // $article = App\Article::all();
    //$article = App\Article::latest()->get('published'); // order by created_at desc
    // $article = App\Article::latest()->get(); // order by created_at desc
    return view('about', [
        'articles' => App\Article::take(3)->
        latest()->get()
    ]);
});

// order matters!

Route::get('/articles','ArticlesController@index')->name('articles.index');
Route::post('/articles','ArticlesController@store');
// get create form
Route::get('/articles/create','ArticlesController@create');
Route::get('/articles/{article}','ArticlesController@show')->name('articles.show');
Route::get('/articles/{article}/edit','ArticlesController@edit');
Route::put('/articles/{article}', 'ArticlesController@update');

// every location where you hardcoded a url need to be updated
// therefore use a named route




