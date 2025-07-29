<?php


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $user = App\Models\User::find(2);
    dump($user->fullName); // get custom Accessor
    dump($user->name); // get  Accessor
});
