<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title upsert(array of data,array of unique value,array of update value) method
    // hint upsert() method used for creating multiple instance or updating multiple instance based  on unique matched value

    // hint : creating dummy data for creating multiple instances
    // $users = [
    //     ['name' => 'ahmed', 'email' => 'ahmed@gmail.com', 'password' => '123456', 'is_admin' => 0],
    //     ['name' => 'Abdullah', 'email' => 'Abdullah@gmail.com', 'password' => '12345', 'is_admin' => 0],
    //     ['name' => 'Ali', 'email' => 'ali@gmail.com', 'password' => 'AA123456', 'is_admin' => 0],
    //     ['name' => 'asama', 'email' => 'asama@gmail.com', 'password' => 'AA123456$', 'is_admin' => 0],
    //     ['name' => 'Mahmoud', 'email' => 'mahmoud@gmail.com', 'password' => '123456789', 'is_admin' => 1],
    //     ['name' => 'hossam', 'email' => 'hossam@gmail.com', 'password' => '123456', 'is_admin' => 0],
    // ];
    // hint : creating dummy data for updating  instances and creating new one
    $users = [
        // this instance will  be updated
        ['name' => 'ahmed updated', 'email' => 'ahmed@gmail.com', 'password' => '123456', 'is_admin' => 0],
        // this instance will  be created
        ['name' => 'habiba', 'email' => 'habiba@gmail.com', 'password' => 'AA123456$', 'is_admin' => 1],
    ];

    /**
     * $users => should be array of data (Multiple Instance)
     * ['email']=> unique Attribute used to match Instance's emails values
     * if matched,it would update values
     * if not matched,it wouldn't update values
     * ['name', 'is_admin'] => these Attributes will be updated only if matched
     */

    // first run to creating instances
    // second run to update instances that email matched
    User::upsert($users, ['email'], ['name', 'is_admin']);
});
