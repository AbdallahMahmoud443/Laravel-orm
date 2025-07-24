<?php

use App\Models\User;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title inRandomOrder()
    // description: get records in random format from table when run every query (refresh page)
    $users = User::inRandomOrder()->select('id', 'name', 'email')->get();
    dump($users);
});
