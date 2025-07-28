<?php

use App\Models\Post;
use App\Models\Scopes\UserActiveScope;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title : many to many relationship
    // $tags = Post::find(4)->tags; // return collection of tags belong to post
    $posts = Tag::find(2)->posts; // return collection of posts belong to tag
    //----------------------------------//
    // $tags = Post::find(4)->tags()->pluck('name')->toArray();
    // $posts = Tag::find(2)->posts()->orderBy('views', 'desc')->pluck('title')->toArray();
    dump($posts);
});
