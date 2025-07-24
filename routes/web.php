<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: whereAny([attributes],operator,value) & whereAll();
    // description: whereAny() will return true if any of the conditions are true, while whereAll() will return true only if all conditions are true.
    // hint: whereAny() & whereAll() are used to filter the results of a query based on multiple conditions.
    // hint: whereAny() common use to apply one condition on multiple columns.
    $user = User::where('name', 'like', 'ahmed%')->orWhere('email', 'like', 'ahmed%')->get();
    dump($user);
    // Apply query with whereAny
    // return all name or email start with ahmed
    $user = User::whereAny(['name', 'email'], 'like', 'ahmed%')->get();
    dump($user);
    // hint: whereAll() common use to apply one condition on multiple columns.
    $user = User::where('name', 'like', 'ahmed%')->Where('email', 'like', 'ahmed%')->get();
    dump($user);
    // Apply query with whereAny
    // return all name and email start with ahmed
    $user = User::whereAll(['name', 'email'], 'like', 'ahmed%')->get();
    dump($user);
});
