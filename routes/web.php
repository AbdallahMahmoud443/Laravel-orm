<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: min(attribute) & max(attribute) methods in laravel work with (collections)
    // description: min() and max() methods in Laravel work with collections, not with raw queries. So, you can use these methods to get the minimum and maximum values of a column in a collection of models.
    //hint min()
    dump("min() method");
    $min_withdraw = User::min('withdraw');
    $min_withdraw_admins = User::where('is_admin', 1)->min('withdraw');
    $min_deposit_users = User::where('is_admin', 0)->min('deposit');
    // hint: avg(raw query)
    $min_withdraw_and_deposit = User::min(DB::raw('deposit + withdraw'));
    dump($min_withdraw, $min_withdraw_admins, $min_deposit_users, $min_withdraw_and_deposit);
    dump("max() method");
    // hint max()
    $max_withdraw = User::max('withdraw');
    $max_withdraw_admins = User::where('is_admin', 1)->max('withdraw');
    $max_deposit_users = User::where('is_admin', 0)->max('deposit');

    $max_withdraw_and_deposit = User::max(DB::raw('deposit + withdraw'));
    dump($max_withdraw, $max_withdraw_admins, $max_deposit_users, $max_withdraw_and_deposit);
});
