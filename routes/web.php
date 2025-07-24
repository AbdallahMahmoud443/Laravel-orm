<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: sum($attribute) method in laravel work with (collections)
    // description: sum($attribute) method in laravel work with (collections) and it return the sum of the attribute value in the collection
    $total_withdraw = User::sum('withdraw');
    $total_withdraw_admins = User::where('is_admin', 1)->sum('withdraw');
    $total_deposit_users = User::where('is_admin', 0)->sum('deposit');
    // hint: sum(raw query)
    $total_withdraw_and_deposit = User::sum(DB::raw('deposit + withdraw'));
    dump($total_withdraw, $total_withdraw_admins, $total_deposit_users, $total_withdraw_and_deposit);
});
