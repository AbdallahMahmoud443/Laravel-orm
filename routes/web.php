<?php

use App\Models\Post;
use App\Models\Scopes\UserActiveScope;
use App\Models\User;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title mutating events
    // hint: withoutEvents() method is used to disable model events (first way)
    /*  $user = User::withoutEvents(function () {
        User::create([
            'name' => 'test',
            'email' => 'test123@gmail.com',
            'password' => bcrypt('123456789')
        ]);
    });*/
    // hint: using saveQuietly() is used to disable model events for saving,there are some methods like saveQuietly(),updateQuietly() and deleteQuietly() see documentation for more info. (second way)
    $user = new User;
    $user->name = 'test';
    $user->email = 'test1234@gmail.com';
    $user->password = bcrypt('123456789');
    $user->saveQuietly();
});
