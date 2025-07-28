<?php

use App\Models\Post;
use App\Models\Scopes\UserActiveScope;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: Querying belongs to relationships
    // case return posts of specific user's id (first way)
    // $posts = Post::where('user_id', 2)->get();
    // case return posts of specific user's id (Second way) using whereBelongsTo(instance of user)
    // whereBelongsTo($user); work with belongTo Relationship
    // hint: return posts for single user
    // $user = User::find(2);
    // $posts = Post::whereBelongsTo($user)->get();
    // hint: return posts for multiple user
    $users = User::whereIn('id', [2, 3, 4])->get();
    $posts = Post::whereBelongsTo($users)->get(); // return posts for single user
    dump($posts);
});
