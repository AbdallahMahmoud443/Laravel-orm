<?php

use App\Models\Post;
use App\Models\User;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: Anonymous Global scope function
    // description: global scope function is a function that is applied to all queries that are made to the database. It is used to add additional conditions to the query, such as filtering out deleted records or adding a default order by clause.
    $users = User::all();
    dump($users);
});
