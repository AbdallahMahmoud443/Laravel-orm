<?php

use App\Models\User;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title : reorder() method in laravel
    // description : reorder() method in laravel is used to reorder the items in the collection based on the given key. It is used to sort the items in the collection based on the given key. The key can be a string or a closure that returns the value to be used for sorting. The method returns a new collection with the items reordered.
    // usage if we need to rest order of items in collection,or make new order of items in collection
    $users = User::orderBy('deposit', 'desc');
    // note:next line used to reset previous order
    // $query = $users->reorder('deposit'); // data return as collection ordered By Deposit Column
    $query = $users->reorder('withdraw', 'desc'); // data return as collection ordered By Withdraw Column
    dump($query->pluck('withdraw', 'name')->toArray());
});
