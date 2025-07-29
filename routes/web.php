<?php


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $user = App\Models\User::find(2);
    $user->name = 'AHMED';
    $user->save(); // save in lower format
});
