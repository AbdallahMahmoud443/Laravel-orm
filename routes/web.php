<?php


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: Eloquent Relationships Operations (Aggregating related models)
    // withCount() is a convenient method for aggregating the results of a relationship count query into the resulting models.
    // case if i need to return all users with count of posts
    // withCount(relation=>callback)
    $users = App\Models\User::withCount('posts as total_number_of_posts')->get();
    dump($users);
    // case if i need to return all users with count of posts and comments
    $users = App\Models\User::withCount(['posts', 'comments'])->get();
    dump($users);
});
