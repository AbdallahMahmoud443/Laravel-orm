<?php

use App\Models\Post;
use App\Models\Scopes\UserActiveScope;
use App\Models\User;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title mutating events using Custom Quietly function
    // createQuietly() is custom muting method defined in User model
    User::createQuietly([
        'name' => 'Nada',
        'email' => 'Nada1@example.com',
        'password' => '123456',
    ]);
});
