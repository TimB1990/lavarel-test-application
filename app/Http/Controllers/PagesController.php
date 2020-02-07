<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        // return View::make('welcome');
        // return request('name'); // to fetch some item.
        // return Request::input('name')
        // return File::get(public_path('index.php'));

        Cache::remember('foo',60, fn()=>'foobar'); 
        // IS SAME AS BELOW:
        // function () {return 'foobar'}
        return Cache::get('foo');
    }
}
