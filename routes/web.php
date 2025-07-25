<?php

use App\Models\User;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: has() & doesntHave() method in laravel Orm
    // hint: has() method is used to filter the records that have a relationship with the given condition
    // hint: doesntHave() method is used to filter the records that do not have a relationship with the given condition
    // case : if I need to retrieve all users that have a posts, I can use the has() method like this:
    $users = User::has('posts')->get();
    dump($users);
    // case : if I need to retrieve all users that do not have a posts, I can use the doesntHave() method like this:
    $users = User::doesntHave('posts')->get();
    dump($users);
    // case : if I need to retrieve all users that have a posts and the posts count is greater than 2, I can use the has() method like this:
    $users = User::has('posts', '>=', 3)->get();
    dump($users);
});
