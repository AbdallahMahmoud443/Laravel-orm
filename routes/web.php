<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title : find(primary key or [keys],[attributes as alias]) & findOr(primary key ) & findOrFail(primary key)
    // hint: find() & findOr() & findOrFail() are used to find a record from the database.

    // hint: find() returns a single record or null if the record is not found.
    // $user_1 = User::find(12);
    // dump($user_1);
    //--------------------------------------------------//
    // $users = User::find([12, 13, 14]);
    // $users = User::find([12, 13, 14], ['name as username']);
    // dump($users);
    //--------------------------------------------------//
    // hint: findOr() returns a single record or creates a new record if the record is not found.
    // $user_2 = User::findOr(
    //     11,
    //     function () {
    //         return User::create([
    //             'name' => 'Shazly',
    //             'email' => 'Shazly3@example.com',
    //             'password' => bcrypt('123456789')
    //         ]);
    //     }
    // );
    // dump($user_2);
    //--------------------------------------------------//
    // hint: findOrFail() returns a single record or throws a ModelNotFoundException if the record is not found.
    // $user_3 = User::findOrFail(14);
    // dump($user_3);
});
