<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title : pluck() method in Laravel
    // hint: pluck(Attribute, Key) method is used to retrieve all values from a specific column in a database table.
    // hint: pluck() method returns Collection of values. (base collection)
    // hint: toArray() method is used to convert a collection to an array.
    $emails = User::pluck('email')->toArray();
    // note: return format (Ahmed => ahmed@gmail.com, Ali => ali@gmail.com)
    $emails = User::pluck('email', 'name')->toArray();
    //hint: pluck() with certain condition\
    $emails = User::where('is_Admin', 1)->pluck('email')->toArray();
    dump($emails);
});
