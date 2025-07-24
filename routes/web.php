<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: whereIn(attribute, array) vs WhereInStrict(attribute, array)
    // description: whereIn() is used to filter records where a column's value is in a list of values, while whereInStrict() is used to filter records where a column's value is in a list of values, but the values must be strictly equal to the values in the list.

    // condition (id == 1 || id== 2 || id == 3)
    $user_1 = User::whereIn('id', [1, 2, 3, 4])->get();
    // condition (id === 1 || id=== 2 || id === '3')
    $user_2 = User::get();
    // important: whereInStrict() work with returned collection, not use when build query
    $user_2 = $user_2->whereInStrict('id', [1, 2, '3']); // return Instance of id's = 1,2 but '3' is not equal to 3 that located in database
    dump($user_1, $user_2);
});
