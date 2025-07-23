<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: all() vs get() methods in laravel orm
    // hint: all() method returns a collection of all the records in the database, while get() method returns a collection of all the records that match the given conditions.
    // hint: all() method is faster than get() method because it does not need to filter the records. However, get() method is more flexible because it allows you to pass conditions as parameters.
    // hint: all() method is used when you want to retrieve all the records from the database, while get() method is used when you want to retrieve records that match certain conditions.
    // Basic get() - no arguments
    // $users = User::get();
    // get() with specific columns
    $users = User::where('is_admin', false)->get(['name', 'email']);
    dd($users);
});
