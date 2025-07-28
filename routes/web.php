<?php

use App\Models\Post;
use App\Models\Scopes\UserActiveScope;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title : pivot table options (this wat tor retrieve columns in pivot table) use pivot
    $tags = Tag::find(2);
    /*
    foreach ($tags->posts as $post) {
        dump($post->pivot->created_at);
    }*/
    //using custom name of pivot table
    foreach ($tags->posts as $post) {
        dump($post->CustomPostComments->created_at);
    }
});
