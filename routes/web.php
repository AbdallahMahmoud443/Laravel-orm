<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title : save() method used to save data in database With (creating,updating) instance
    // hint : create new Instance
    /*
    $user = new User();
    $user->name = 'Abdullah Mahmoud';
    $user->email = 'abdullah@gmail.com';
    $user->password = '12345';
    $user->save(); /
    */
    // hint : update instance
    $user = User::find(1);
    $user->name = 'magdy Ahmed';
    $user->save();
});
