<?php

use App\Models\Post;
use App\Models\User;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: local scope in laravel
    // after defined local scope in User model, I can use in controller
    $premium_users = User::premium()->pluck('email', 'name')->toArray(); // run local scope in User model
    dump($premium_users);
    //  user custom local scope
    $admins = User::type('admin')->pluck('email', 'name')->toArray(); // run local scope in User model
    dump($admins);
    $users = User::type('user')->pluck('email', 'name')->toArray(); // run local scope in User model
    dump($users);
});
