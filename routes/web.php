<?php

use App\Models\Post;
use App\Models\Scopes\UserActiveScope;
use App\Models\User;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // should create user to dispatch events closures related with this operation
    $user = User::create([
        'name' => 'Abdullah',
        'email' => 'Abdullah@doe.com',
        'password' => bcrypt('123456')
    ]);
    
});
