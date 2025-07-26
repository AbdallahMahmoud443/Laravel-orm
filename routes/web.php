<?php

use App\Models\Post;
use App\Models\User;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: replicating
    // description : replicating is something that is done to copy something exactly as the original
    // first we create a post (or you can retrieve it from the database and then replicate it)
    $post = Post::create([
        'title' => 'How To Learn Laravel',
        'likes' => 100,
        'views' => 1000,
        'user_id' => 1,
    ]);
    // replicated instance of the post with new data
    // replicate() will create a new instance of the post with the same data as the original post
    // important replicate([columns]) columns are the columns we don't want to change,must columns have default value in migrations file of table to work
    // fill() will fill the new instance with the data we want to change
    // save() will save the new instance to the database
    $post_v2 = $post->replicate()->fill([
        'title' => 'How To Learn Laravel 2',
        'likes' => 0,
        'views' => 0,
        'user_id' => 1,
    ]);
    /*
    $post_v2 = $post->replicate(['likes'])->fill([
        'title' => 'How To Learn Laravel 2',
        'views' => 0,
        'user_id' => 1,
    ]);
    */
    $post_v2->save();
});
