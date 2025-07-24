<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: whereIn(attribute, array) vs WhereNotIn(attribute, array)
    // description: whereIn() and whereNotIn() are two methods in Laravel that are used to filter records based on a list of values.
    // hint example: whereIn() is used to filter records where a column's value is in a list of values, while whereNotIn() is used to filter records where a column's value is not in a list of values.
    // condition (id == 1 || id== 2 || id == 3) vs
    $user_1 = User::whereIn('id', [1, 2, 3, 4])->get();
    // condition (id != 1 && id != 2 && id != 3)
    $user_2 = User::whereNotIn('id', [1, 2, 3])->get();
    dump($user_1, $user_2);
});
