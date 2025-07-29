<?php


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: Eloquent Relationships Operations (Deferred aggregation loading)
    // description : Deferred aggregation in Laravel refers to performing aggregate queries on already retrieved Eloquent models, rather than executing a separate database query for the aggregation. This is particularly useful when you have a model instance and want to calculate an aggregate value (like a count, sum, or average) based on its related data without needing to fetch the entire relationship collection first.
    // case : return count of posts foreach users
    $user = App\Models\User::find(3);
    // $posts_count =  $user->posts()->count(); // normal Way
    // $posts_count =  $user->loadCount('posts'); // see documentation for more methods
    // dump($posts_count);
    //------------------------------------------------------//
    // case return max likes of posts foreach users
    // $posts_max_likes =  $user->loadMax('posts', 'likes');
    // dump($posts_max_likes);
    //------------------------------------------------------//
    // return count of posts it's views greater than 300
    $posts_count =  $user->loadCount(['posts' => function ($query) {
        $query->where('views', '>', 300);
    }]);
    dump($posts_count);
});
