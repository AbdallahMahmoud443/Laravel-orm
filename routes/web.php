<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: whereColumn()
    // description: whereColumn() is a method in Laravel that allows you to add a condition to a query based on a column in a related table. It is used to compare a column in the current table with a column in a related table.
    // first usage whereColumnName() in Laravel
    $user = User::whereId(1)->get();
    $Admins = User::whereIsAdmin(1)->get();
    $name_null = User::whereName(null)->get();

    dump(
        $user,
        $Admins,
        $name_null,
    );
    // important this method important to use in the case of the relationship between two tables
    // second usage whereColumnName() in Laravel to compare a column in the current table with a column in a related table.
    $users = User::whereColumn('deposit', '>', 'withdraw')
        ->get();
    dump($users);
    // whereColumn() is particularly useful for data integrity checks, business rule enforcement, and complex filtering scenarios where you need to compare values within the same row or across related tables.
});
