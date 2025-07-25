<?php

use App\Models\User;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: whereHas() & whereDoesntHave() method in laravel Orm
    // hint: whereHas() is used to filter the records based on the relationship
    // hint: whereDoesntHave() is used to filter the records which does not have the relationship
    // case: if i need to get the users who have posts that likes greater than 450, i can use whereHas() method
    $users = User::whereHas('posts', function ($q) {
        return $q->where('likes', '>', 450);
    })->get(); // this will return the users who have posts that likes greater than 450
    dump($users);
    // case: if i need to get the users who do not have posts that likes greater than 450, i can use whereDoesntHave() method
    $users = User::whereDoesntHave('posts', function ($q) {
        return $q->where('likes', '>', 450);
    })->get(); // this will return the users who do not have posts that likes greater than 450
    dump($users);
});
