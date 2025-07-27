<?php

use App\Models\Post;
use App\Models\User;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: global scope function  in laravel orm
    // description: global scope function is a function that is applied to all queries that are made to the database. It is used to add additional conditions to the query, such as filtering out deleted records or adding a default order by clause.
    // when I need to create global scope class that used to applied specific condition to all queries belong to more than one model, I need to create a global scope class and register it in boot method of AppServiceProvider class
    // hint: run command php artisan make:scope UserActiveScope to create global scope class

    $active_users = User::all();
    dump($active_users); // return all users after global scope applied to all queries belong to User model
    
});
