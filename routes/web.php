<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: whereNull(attribute) vs WhereNotNull(attribute)
    // description: whereNull() is used to filter records where a column's value is null, while whereNotNull() is used to filter records where a column's value is not null.

    // condition (name == null)
    $user_1 = User::whereNull('name')->get();
    // condition (name != null)
    $user_2 = User::whereNotNull('name')->get();
    dump($user_1, $user_2);
});
