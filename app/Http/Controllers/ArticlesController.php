<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Article;
// use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {
        // render list of resource
        if(request('tag')){
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
        }
        else{
            $articles = Article::latest()->get();
        }

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
        return view('articles.create', [
            'tags' => Tag::all()
        ]);
    }

    public function store()
    {
        
        /*Article::create($this->validateArticle());*/
        // herer we would pass things to the article instance but tag is no part of it, it is an relation ship, therefore apply the notation containing an array. The validation no longer maps
        // $article = new Article($this->validateArticle());
        $this->validateArticle();
        $article = new Article(request(['title','excerpt','body']));
        $article->user_id = 1; // auth()->id()
        $article->save();

        // auth()->user()->articles()->create($article);

        $article->tags()->attach(request('tags'));
        return redirect(route('articles.index'));

    }

    public function edit(Article $article)
    {
        // find the article associated with the id, [] to pass article to the view
        // return view('articles.edit',['article' => $article]);
        return view('articles.edit',compact('article'));

    }

    public function update(Article $article)
    {

        $article->update($this->validateArticle());
        return redirect($article->path());
    }


    public function destroy()
    {
        // delete the resource

    }

    // this method allows you to add fields any time without repeating the differences over every method in this class
    // this case only works when the data to validate is identical in both store() and update()
    protected function validateArticle()
    {
        return request()->validate([
            'title'=>['required', 'min:3', 'max:255'],
            'excerpt'=>['required', 'min:3', 'max:255'],
            'body'=>['required', 'min:10', 'max:500'],
            'tags' => 'exists:tags, id' // the tag whether it is id or array needs to exist on tag table
        ]);
    }

}
