<?php


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: Eloquent Relationships Operations (attach() & detach()) work with many to many relationships
    // hint:attach() method is used to attach a record to the relationship
    $post = App\Models\Post::find(1);
    // $post->tags()->attach(1); // attach a tag to a post
    // $post->tags()->attach([1, 2, 3]); // attach multiple tags to a post
    $post->tags()->attach([1, 2], ['created_at' => now(), 'updated_at' => now()]); // attach multiple tags to a post with custom data in pivot table
    //------------------------------------------------------//
    // hint:detach() method is used to detach a record to the relationship
    // $post->tags()->detach(1); // detach a tag to a post
    // $post->tags()->detach([2, 3]); // attach multiple tags to a post
});
