<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {
        // render list of resource
        $articles = Article::latest()->get();
        return view('articles.index', ['articles' => $articles]);
    }

    // public function show($id)
    public function show(Article $article) //or ($id) but in web.php the wildcard has to match the name of Article $article
    {
        // show single resource 
        // $article = Article::findOrFail($id);
        return view('articles.show', ['article' => $article]);

    }

    public function create()
    {
        // shows a view to create a new resource
        return view('articles.create');

    }

    public function store()
    {
        // validation
        request()->validate([
            'title'=>['required', 'min:3', 'max:255'],
            'excerpt'=>['required', 'min:3', 'max:255'],
            'body'=>['required', 'min:10', 'max:500']
        ]);


        // clean up 
        /*$article = new Article();
        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');

        $article->save();*/

        Article::create([
            ''
        ]);

        return redirect('/articles');

    }

    public function edit(Article $article)
    {
        // $article = Article::findOrFail($id);

        // find the article associated with the id, [] to pass article to the view
        // return view('articles.edit',['article' => $article]);
        return view('articles.edit',compact('article'));

    }

    public function update(Article $article)
    {
        // persist the edited resource
        // $article = Article::findOrFail($id);

        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');

        $article->save();

        return redirect('/articles/' . $article->id);

    }

    public function destroy()
    {
        // delete the resource

    }

}
