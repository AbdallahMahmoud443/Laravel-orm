<?php

use App\Models\Post;
use App\Models\Scopes\UserActiveScope;
use App\Models\User;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // should create user to dispatch events closures related with this operation
    // this will trigger UserCreated event related with this user Model
    $user = User::create([
        'name' => 'Abdullah new',
        'email' => 'AbdullahNew@doe.com',
        'password' => bcrypt('123456')
    ]);

    // this will trigger UserDeleted event related with this user Model
    User::find(12)->delete();
});
