<?php

use App\Models\User;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title : groupBy() method
    // description : groupBy() method is used to group the data by a specific column.
    // note: this method write in query  at the end of the query.
    $users = User::get()->groupBy('is_admin'); // hint: return array of array
    dump($users);
});
