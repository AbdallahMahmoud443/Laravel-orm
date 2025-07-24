<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: whereDay() vs whereMonth() vs whereYear() vs whereDate()
    // description: these methods are used to filter the data based on the date.
    // hint: whereDate()
    // $users_1 = User::whereDate('created_at', '2023-06-21')->get();
    // $users_2 = User::whereDate('created_at', '>', '2002-04-14')->get();
    // $users_3 = User::whereDate('created_at', '<', '2002-04-14')->get();
    // hint: whereDay()
    // $users_1 = User::whereDay('created_at', '21')->get();
    // $users_2 = User::whereDay('created_at', '>', '14')->get();
    // $users_3 = User::whereDay('created_at', '<', '14')->get();
    // hint: whereMonth()
    // $users_1 = User::whereMonth('created_at', '3')->get();
    // $users_2 = User::whereMonth('created_at', '>', '08')->get();
    // $users_3 = User::whereMonth('created_at', '<', '5')->get();
    // hint: whereYear()
    $users_1 = User::whereYear('created_at', '2000')->get();
    $users_2 = User::whereYear('created_at', '>', '2005')->get();
    $users_3 = User::whereYear('created_at', '<', '2019')->get();
    dump($users_1, $users_2, $users_3);
});
