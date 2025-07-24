<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: count() method in  work with (collections)
    // description: The count() method in Laravel is a convenient way to get the number of records in a database table. It returns the count of the records that match the given conditions, or all the records if no conditions are specified.
    // example: Get the count of all users
    $all_users_count = User::count();
    $admins_count = User::where('is_admin', true)->count();
    $users_count = User::where('is_admin', false)->count();
    dump($all_users_count, $admins_count, $users_count);
});
