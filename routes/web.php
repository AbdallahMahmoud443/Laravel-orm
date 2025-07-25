<?php

use App\Models\User;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: with(RelationName) method in laravel Orm
    // description: The with() method is used to eager load a relationship. It allows you to load a related model or models at the same time as the main model. This can improve performance by reducing the number of database queries needed to retrieve related data.
    // case: if I need to retrieve the user and its posts at the same time, I can use the with() method to load the posts relationship when retrieving the user.
    $users = User::with('posts')->get();
    // case: if i need to retrieve the user and it's posts that has likes more than 300
    $users = User::with([
        'posts' => function ($q) {
            $q->where('likes', '>', 300)->latest('likes'); // put condition on data returned from relations
        }
    ])->get();
    dump($users);
});
