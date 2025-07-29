<?php


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: casting
    $user = App\Models\User::find(2);
    $user->is_admin = false; // set false to 0 when update record
    $user->save(); // save in lower format
    dump($user->is_admin); // return false instead of 0 when retrieve record
});
