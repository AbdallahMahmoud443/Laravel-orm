<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // hint:  create user withouts timestamps use withoutTimestamps(callback) (second way)
    User::withoutTimestamps(function () {
        return User::create([
            'name' => 'John Doe',
            'email' => 'John@gmail.com',
            'password' => "123455",
            'is_admin' => 1
        ]);
    });
});
