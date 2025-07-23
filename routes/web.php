<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title : select() & addSelect() methods
    // hint: select($attributes) method is used to select specific columns from the table
    // hint: addSelect($attributes) method is used to add additional columns to the selected columns
    // hint: select('*') method is used to select all columns from the table
    // hint: addSelect('*') method is used to add all columns to the selected columns
    //  $users = User::select('name', 'email')->addSelect('created_at')->get();
    $users = User::where('is_admin', true)->select('name as username', 'email as userEmail')->addSelect('created_at')->get();
    // select($attributes) vs get($attributes)
    // select($attributes) method returns a collection of objects with the specified attributes
    // get($attributes) method returns a collection of objects with all attributes
    // select($attributes) method is faster than get($attributes) method
    // select($attributes) method is used to select specific columns from the table
    dump($users);
});
