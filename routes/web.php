<?php

use App\Models\Post;
use App\Models\Scopes\UserActiveScope;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: Has many through relationship
    // hasManyThrough relationShip is used when we want to access multiple records the data of a table through another table.

    // get all comments of a user's post using (has many through) relationship
    $comments = User::find(7)->comments;
    dump($comments);
});
