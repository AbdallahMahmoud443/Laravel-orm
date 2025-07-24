<?php

use App\Models\User;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title latest(attribute) & oldest(attribute) in laravel
    // description: latest(attribute) & oldest(attribute) in laravel are used to get the latest and oldest record from the database.
    // hint: latest(attribute) is used to get the latest record from the database. (desc)
    // hint: oldest(attribute) is used to get the oldest record from the database. (asc)
    // title orderBy() & orderByRaw() in laravel (latest & oldest &orderByDesc & orderByRaw put) After any condition
    // example:
    $users = User::latest('deposit')->pluck('deposit', 'name')->toArray();
    dump($users);
    $users = User::oldest('deposit')->pluck('deposit', 'name')->toArray();
    dump($users);
});
