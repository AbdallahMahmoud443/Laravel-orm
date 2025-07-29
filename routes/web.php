<?php


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: Eloquent Relationships Operations (save() & create() on relationships)
    // case if I need create post for user's id = 3
    $user = App\Models\User::find(3);
    // this line will create post for user's id = 3 (create() method)
    /*  $post = $user->posts()->create([
        'title' => 'Learn javascript',
        'likes' => 0,
        'views' => 0,
    ]);*/
    //------------------------------------------------//
    // second way to create instance related to another instance (save() method)
    /* $post = new App\Models\Post();
    $post->title = 'Learn Python';
    $post->likes = 0;
    $post->views = 0;
    $user->posts()->save($post); // this line of code will create post for user's id = 3 (save() method)*/
    //-------------------------------------------------------------//
    // create multiple posts for user's id = 3 using createMany(arrayOfArrays) method
    /* $user->posts()->createMany([
        [
            'title' => 'Learn PHP',
            'likes' => 0,
            'views' => 0,
        ],
        [
            'title' => 'Learn Laravel',
            'likes' => 0,
            'views' => 0,
        ],
    ]);*/
    //-------------------------------------------------------------//
    // create multiple posts for user's id = 3 using saveMany(arrayOfInstances) method
    $posts = [
        new App\Models\Post(['title' => 'Learn wordpress', 'likes' => 0, 'views' => 0]),
        new App\Models\Post(['title' => 'Learn LLM', 'likes' => 0, 'views' => 0]),
    ];
    $user->posts()->saveMany($posts);
});
