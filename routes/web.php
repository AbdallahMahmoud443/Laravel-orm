<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: avg($attribute) method in laravel work with (collections)
    // description: avg($attribute) method in laravel work with (collections) and not work with (raw query) return the average of the given column.

    $avg_withdraw = User::avg('withdraw');
    $avg_withdraw_admins = User::where('is_admin', 1)->avg('withdraw');
    $avg_deposit_users = User::where('is_admin', 0)->avg('deposit');
    // hint: avg(raw query)
    $avg_withdraw_and_deposit = User::avg(DB::raw('deposit + withdraw'));
    dump($avg_withdraw, $avg_withdraw_admins, $avg_deposit_users, $avg_withdraw_and_deposit);
});
