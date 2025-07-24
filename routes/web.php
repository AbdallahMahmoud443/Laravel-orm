<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title:  whereBetween() vs whereNotBetween() in laravel orm
    // description:  whereBetween() and whereNotBetween() are two methods in Laravel's Eloquent ORM that allow you to filter records based on a range of values for a specific column.


    // hint: whereBetween() method: The whereBetween() method allows you to filter records where the value of a specific column is between a given range of values. It takes two arguments: the name of the column and an array of two values representing the lower and upper bounds of the range.
    // (withdraw>1000 and withdraw<5000) will be true
    $users_1 = User::whereBetween('withdraw', [1000, 5000])->get();
    // hint: whereNotBetween() method: The whereNotBetween() method allows you to filter records where the value of a specific column is not between a given range of values. It also takes two arguments: the name of the column and an array of two values representing the lower and upper bounds of the range.
    // condition (withdraw>1000 and withdraw<5000) will be false
    $users_2 = User::whereNotBetween('withdraw', [1000, 5000])->get();
    dump($users_1, $users_2);
});
