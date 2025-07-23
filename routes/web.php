<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // hint: all() method returns all records from the database with all attributes at once
    // $user = User::all();
    //----------------------------------------//
    // hint: all([attributes]) return all records from the database with only the specified attributes
    //  $user = User::all(['name', 'email']); // return all users with name and email attributes
    //----------------------------------------//
    // hint: all([columnName as alias ]) return all records from the database with only the specified attributes with alias
    $user = User::all(['name as username', 'email as user_email']);
    dump($user);
    dump($user[0]->username); // note: use alias instead of name
});
