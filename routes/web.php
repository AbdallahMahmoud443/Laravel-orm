<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: whenEmpty(callback=>true,callback=>false) vs whenNotEmpty(callback=>true,callback=>false) in laravel
    // description:  whenEmpty() and whenNotEmpty() are methods provided by the Laravel framework to conditionally display content based on the presence or absence of data in a collection or variable.
    // important working with collection
    $users = User::whereNull('name')->get(); // return data
    $emails = User::whereNull('email')->get(); // return empty collection
    // hint: whenEmpty()
    $users->whenEmpty(function () {
        dump('Collection is empty');
    }, function () {
        dump('Collection is not empty'); // print this
    });
    $emails->whenEmpty(function () {
        dump('Collection is empty'); // print this
    }, function () {
        dump('Collection is not empty');
    });

    // hint: whenNotEmpty()
    $users->whenNotEmpty(function () {
        dump('Collection is not empty'); // print this
    }, function () {
        dump('Collection is empty');
    });
    $emails->whenNotEmpty(function () {
        dump('Collection is Not empty');
    }, function () {
        dump('Collection is empty'); // print this
    });
});
