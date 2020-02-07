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

    public function author(){
        // the foreign key has been set as second argument because other author-id does not exist
        return $this->belongsTo(User::class,'user_id');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}

// an article has many tags
// tag belongs to an article

// learn laravel
// tags: php, laravel, work, education

// tag does not belong to learn laravel, because it won't be unique. This tag could belong to many articles
// many to many relationship. the same tag can be used in many articles

// an article has many tags, and an tag could belong to many articles
