<?php

use App\Models\User;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title orderBy(attribute,mode) & orderByRaw(RawSQL) in laravel
    // description: orderBy() & orderByRaw() in laravel are used to sort the data in the database.
    // hint: orderBy() is used to sort the data in ascending order by default.
    // hint: orderByRaw() is used to sort the data in ascending or descending order by using raw SQL query.
    // example:
    $users = User::orderBy('deposit', 'asc')->pluck('deposit', 'name')->toArray();
    dump($users);
    $users = User::orderByRaw('deposit desc')->pluck('deposit', 'name')->toArray();
    dump($users);
    // if i need arrange data based on the number of characters in the name
    $users = User::orderByRaw('length(name) desc')->pluck('deposit', 'name')->toArray();
    dump($users);
});
