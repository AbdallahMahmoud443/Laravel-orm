<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: firstWhere(condition or conditions)
    // description: get the first record that matches the condition.
    // $user = User::where('is_admin', 1)->first(); // get the first record that matches the condition.
    $user = User::firstWhere('is_admin', 1); // get the first record that matches the condition.
    // with multiple conditions
    $user_1 = User::firstWhere([
        ['is_admin', 1],
        ['deposit', '>', 2000]
    ]);
    dump($user, $user_1);
});
