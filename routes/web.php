<?php


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: Eloquent Relationships Operations (Touching parent timestamps)
    // description: Touching parent timestamps in laravel is a way to update the timestamps of the parent model when a child model is updated.
    // hint: This can be useful in situations where you want to keep track of when a child model was last updated, even if the parent model itself has not been changed.
    // hint: To use the touch method, you can call it on the child model and pass in the name of the parent model as an argument.
    // case i need to update the timestamps of the user model when a post model is updated
    $post = App\Models\Post::find(4); // find the post with id 4 ,user written post id's = 2
    $post->update(['title' => 'Updated Title']); // update the title of the post
});
