<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //$project->user
    public function user()
    {
        return $this->belongsTo(User::class); // select * from user where project_id = 1
    }
}

// when you call user as a property you still automatically call the user method
// hasOne, hasMany, belongsTo, return this project that belongsTo(User::class)