<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title :  where() vs whereStrict() in laravel orm
    // description: In Laravel, the where() and whereStrict() methods are used to add conditions to a query. The main difference between the two methods is that where() allows for loose comparisons (==), while whereStrict() allows for strict comparisons (===).

    $users = User::where('is_admin', 1)->get(); // return collection with element is_admin = 1
    $users_1 = User::where('is_admin', 0)->get(); // return collection with element is_admin = 01
    // important whereStrict() => work with collection only
    dump($users_1->whereStrict('id', 1)); // return  collection with element id's = 1
    dump($users_1->whereStrict('id', '1'));  // return  empty collection because '1' is not equal to 1
    /**
     * Use whereStrict() when dealing with:
            1-Boolean values
            2-Null checks
            3-Type-sensitive data
     */
});
