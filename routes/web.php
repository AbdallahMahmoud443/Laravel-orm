<?php


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: Eloquent Relationships Operations
    // hint: every eloquent operations we do in single model,we can do it in Relations
    // important: to do operation on relation,returned relation should be Query builder
    // case if I need return most recent 2 posts from user id =2
    // posts() is relation in form of query builder
    $latest_posts = App\Models\User::find(2)->posts()->latest()->take(2)->get();
    dump($latest_posts);
    //case if I need return most views 2 posts from user id = 2
    $most_views_posts = App\Models\User::find(2)->posts()->orderBy('views', 'desc')->take(2)->get();
    dump($most_views_posts);
    // case if I need sum of likes on post related to user id = 2
    $sum_of_likes = App\Models\User::find(2)->posts()->sum('likes');
    dump($sum_of_likes);
    // case if I need posts it's likes greater than 300 for user id = 2
    $posts_with_likes_greater_than_200 = App\Models\User::find(2)->posts()->where('likes', '>', 300)->get();
    dump($posts_with_likes_greater_than_200);
});
