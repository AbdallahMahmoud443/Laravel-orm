<?php


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: Eloquent Relationships Operations (Querying relation existence & absence)
    // return users based on condition on relations model
    //----------------------------------------------------//
    // hint: has(relation,operator,count) - Checks if the related model exists.
    // case return all users who have posts
    $users = App\Models\User::has('posts')->get();
    dump($users);
    //----------------------------------------------------//
    // hint: doesntHave(relation,operator.count) - Checks if the related model does not exist.
    // case return all users who don't have posts
    $users = App\Models\User::doesntHave('posts')->get();
    dump($users);
    //----------------------------------------------------//
    // hint: whereHas() - Checks if the related model exists and has a specified relationship.
    // case return all users who have posts it's view greater than 200
    $users = App\Models\User::whereHas('posts', function ($query) {
        $query->where('views', '>', 200);
    })->get();
    dump($users);
    //----------------------------------------------------//
    // hint: whereDoesntHave() - Checks if the related model does not exist or does not have a specified relationship.
    // case return all users who have posts it's views don't greater than 200
    $users = App\Models\User::whereDoesntHave('posts', function ($query) {
        $query->where('views', '>', 200);
    })->get();
    dump($users);
    //----------------------------------------------------//
    // hint : work with nested relationship return user based on comments for Example
    // case return all users who have posts it's comments title contain good
    $users = App\Models\User::whereHas('posts.comments', function ($query) {
        $query->where('comment', 'like', '%good%');
    })->get();
    dump($users);
    // case return all users who have posts has comments
    $users = App\Models\User::has('posts.comments')->get();
    dump($users);
});
