<?php


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: Eloquent Relationships Operations (associate() & disassociate())
    // work only with belongTo() relationship
    // hint: associate() is to update the foreign key of the related model

    $post = App\Models\Post::find(1);
    $post->user()->associate(App\Models\User::find(2));
    $post->save();
    //-----------------------------------------------------------//
    // hint: disassociate() is to remove the foreign key of the related model
    $post = App\Models\Post::find(1);
    $post->user()->disassociate(); // make user_id = null
    $post->save();
    //-----------------------------------------------------------//
});
