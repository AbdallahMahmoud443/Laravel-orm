<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // hint: create() method work with mass assignable attributes return created Instance
    /*$user = User::create([
        'name' => 'Asama',
        'email' => 'asama@gmail.com',
        'password' => '123456',
        'is_admin' => 1,
    ]);*/
    // hint: update() method work with exiting Instance return Boolean Value
    // hint: should be select instance first before update
    User::find(3)->update([
        'name' => 'Asama Ali'
    ]);
});
