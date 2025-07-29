<?php


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: casting
    $user = App\Models\User::find(2);
    dump($user->deposit); // return deposit as string with $
});
