<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: where(attribute,operator,value or callback) method in laravel orm === && , orWhere(attribute,operator,value or callback) === ||  methods in laravel orm
    // description: where() method is used to filter the records from the database. It is used to add a where clause to the query. It can be used to filter the records based on a single column or multiple columns.

    // description: orWhere() method is used to add an or where clause to the query. It is used to add an additional condition to the query. It can be used to filter the records based on a single column or multiple columns.

    $users_1 = User::where('id', 1)->get(); // where('id', 12) is equal to where('id', '=', 12)
    $users_2 = User::where('deposit', '>', 1000)->get();
    // where with multiple conditions (deposit > 1000 && id = 12)
    $users_3 = User::where('deposit', '>', 1000)->where('id', 1)->get();
    // where with multiple conditions using orWhere (deposit > 1000 || id = 12)
    $users_4 = User::where('deposit', '>', 2000)->orWhere('id', 5)->get();
    // where with multiple conditions using orWhere (deposit > 1000 && deposit < 2000)
    $users_5 = User::where('deposit', '>', 1000)->where('deposit', '<', 2000)->get();
    // second way for multiple conditions using Where (deposit > 1000 && deposit < 2000)
    $users_6 = User::where([
        ['deposit', '>', 1000],
        ['deposit', '<', 2000],
    ])->get();
    // hint: orWhere (deposit > 1000 || is_admin = 0)
    $users_7 = User::where('deposit', '>', 1000)->orWhere('is_admin', 0)->get();
    // hint: orWhere (deposit > 1000 || withdraw > 1000 && is_admin = 0)
    $users_8 = User::where('deposit', '>', 1000)->orWhere('withdraw', '>', 1000)->Where('is_admin', 0)->get();
    // hint: where(callback) this approach work with filtering when you have multiple conditions
    // $query is the instance of the query builder
    $role = 1;
    $users_9 = User::where(function ($query) use ($role) {
        return $query->where('deposit', '>', 3000)->orWhere('withdraw', '>', 1000)->where('is_admin', $role);
    })->get();
    dump(
        $users_1,
        $users_2,
        $users_3,
        $users_4,
        $users_5,
        $users_6,
        $users_7,
        $users_8,
        $users_9
    );
});
