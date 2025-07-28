<?php

use App\Models\Post;
use App\Models\Scopes\UserActiveScope;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title:one to many relationship user and posts
    // Example: return all posts of a user has id = 9
    $posts = User::find(9)->posts;
    // Example: return all posts titles orderby likes  of a user has id = 9
    $posts = user::find(9)->posts()->orderBy('likes', 'desc')->pluck('title');
    // Example: return which User written specific post has id = 1
    $user = App\Models\Post::find(1)->user->name;
    
    dump($user);
});
