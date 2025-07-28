<?php

use App\Models\Post;
use App\Models\Scopes\UserActiveScope;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title : pivot options
    $tag = Tag::find(2);
    dump($tag->posts()->where('posts.title', 'like', '%a%')->get());
});
