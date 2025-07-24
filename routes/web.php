<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: first() & firstOr & firstOrFail()
    // hint: first() will return the first record of the collection. If the collection is empty, it will return null.
    // hint: firstOr() will return the first record of the collection or a default value if the collection is empty.
    // hint: firstOrFail() will return the first record of the collection or throw an exception if the collection is empty.
    $user_1 = User::where('is_admin', true)->first(['name', 'email']);
    $user_2 = User::where('password', '1234561541254')->firstOr(function () {
        return 'not found matched password'; // if the collection is empty, it will return this value
    });
    $user_3 = User::where('is_admin', 0)->firstOrFail(); // if the collection is empty, it will throw an exception
    dump($user_1, $user_2, $user_3);
});
