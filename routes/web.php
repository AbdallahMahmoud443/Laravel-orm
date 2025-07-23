<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // hint: firstOrCreate(condition,data) Method return first matched Instance or create new one if not found return Instance
    // case 1 : condition => true (return Instance if found)
    /*   $user = User::firstOrCreate(
        ['email' => 'john@gmail.com'],
        [
            'name' => 'John Doe',
            'email' => 'john@gmail.com',
            'password' => '123456'
        ]
    );*/
    // case 2 : condition => false
    // important: create new Instance and save it in database
    /*  $user = User::firstOrCreate(
        ['email' => 'john11@gmail.com'],
        [
            'name' => 'John Doe',
            'email' => 'john11@gmail.com',
            'password' => '123456'
        ]
    );*/
    // hint: firstOrNew(condition,data) Method return first matched Instance or create new one, doesn't save it in database if not found Instance
    // case 1 : condition => true (return Instance if found)
    $user = User::firstOrNew(
        ['email' => 'john@gmail.com'],
        [
            'name' => 'John Doe',
            'email' => 'john@gmail.com',
            'password' => '123456'
        ]
    );
    // case 2 : condition => false (create new Instance,then doesn't save it in database)
    $user = User::firstOrNew(
        ['email' => 'john11@gmail.com'],
        [
            'name' => 'John Doe',
            'email' => 'john@gmail.com',
            'password' => '123456'
        ]
    );
    $user->save(); // important: save Instance in database (this is core deference between firstOrCreate and firstOrNew)
    dump($user);
});
