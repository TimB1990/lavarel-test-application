<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // mass assignment vurnability is in situations when unexpeted en undeclared parameter is passed from the request and changes
    // something in table
    protected $fillable = ['title','excerpt','body'];

    // frequently you are linking to specific resource, therefore add method path
    public function path(){

        // return route and parse in current instance by 'this'
        return route('articles.show', $this);
    }

}
