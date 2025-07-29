<?php


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: Eloquent Relationships Operations (Eager loading)
    // description: Eager loading is a way to load all the related models in a single query.
    // first make query to get all the posts from the database,then for each post we make another query to  get the related user in this case will cause N+1 Problem.
     $posts = App\Models\Post::get(); // is called (lazy loading) and it will cause N+1 Problem.
    // to prevent this problem we can use eager loading to load all the related models in a single query. (N+1) use With() method to load the related models in a single query.

    // $posts = App\Models\Post::with('user')->get(); // load users with all posts
    //--------------------------------------------------------//
    /*
    $posts = App\Models\Post::with([
        'user' => function ($q) {
            $q->select('id', 'name');
        }
    ])->get(); // load users (id,name) with all */

    return view('welcome', compact('posts'));
});
