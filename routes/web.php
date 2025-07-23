<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // hint: insert() method add new instance in database return boolean value
    // note: not insert created_at and updated_at fields Automatically
    /* $is_inserting = User::insert([
        'name' => 'John Doe',
        'email' => 'john@gmail.com',
        'password' => '12345',
        'is_admin' => 0
    ]);*/
    // hint: used to insert multi instance at once
    /* $is_inserting = User::insert([
        [
            'name' => 'John Doe',
            'email' => 'john2@gmail.com',
            'password' => '12345',
            'is_admin' => 0
        ],
        [
            'name' => 'abdullah Ali',
            'email' => 'abdullah@gmail.com',
            'password' => '12345',
            'is_admin' => 0
        ]
    ]);*/
    // hint: insertGetId() method add new instance in database return ID value
    $user_id = User::insertGetId([
        'name' => 'abdullah Ali',
        'email' => 'abdullah1@gmail.com',
        'password' => '12345',
        'is_admin' => 0
    ]);
    dd($user_id);
});
