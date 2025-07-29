<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title Relational Factories
    // create one Post with 1 user (Belongs to relationships )
    // first Way
    // create two posts for 1 new user
    //Post::factory()->for(\App\Models\User::factory())->count(2)->create();
    // second Way
    // important : every thing do in single model factory we apple do here
    // this way do when override attributes in user instances
    /*$user = \App\Models\User::factory()->create();
    Post::factory()->for($user)->count(1)->create();
    Post::factory()->for($user)->count(1)->create([
        'title' => 'Post title',
    ]);*/
});
