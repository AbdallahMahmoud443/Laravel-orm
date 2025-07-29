<?php


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: Eloquent Relationships Operations (Prevent lazy loading)
    // description: lazy loading is when you access a relationship property on an Eloquent model, Laravel will automatically load the related data from the database.
    // prevent lazy loading from any serviceProvider
    $posts = \App\Models\Post::get(); // this line will throw exception because of lazy loading is disabled
    return view('welcome', compact('posts'));
});
