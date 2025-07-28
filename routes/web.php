<?php

use App\Models\Post;
use App\Models\Scopes\UserActiveScope;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: with default behavior
    // case:  will return all post then,it's user has been deleted how handle this case
    $posts = Post::find(10);
    // return user has been written this post,but user has been deleted
    $user = $posts->user;
    dump($user->name); // unKnown User this will return when write withDefault() with in relationship of post
});
