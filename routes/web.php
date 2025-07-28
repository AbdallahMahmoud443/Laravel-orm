<?php

use App\Models\Post;
use App\Models\Scopes\UserActiveScope;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: has one of Many Relationship
    // description: has one of Many Relationship is used when I need to retrieve a single record from a related table based on a condition. In this example, we will retrieve the first  newest post that relation with  given user.
    // case : if i need to return all posts of user with id 2
    // $post = User::find(2)->posts; // return all posts of user with id 2
    // case : if i need to return the first post of user with id 2
    // (First way)
    //$post = User::find(2)->posts()->first(); // return the first post of user with id 2
    // case : if i need to return the newest post of user with id 2
    // $post = User::find(2)->posts()->latest()->first(); // return the newest post of user with id 2
    // case : if i need to return the oldest post of user with id 2
    // $post = User::find(2)->posts()->oldest()->first(); // return the oldest post of user with id 2
    //---------------------------------------------------//
    $post = User::find(2)->latestPost()->get(); // return the newest post of user with id
    dump($post);
});
