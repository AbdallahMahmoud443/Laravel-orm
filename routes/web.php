<?php

use App\Models\Post;
use App\Models\Scopes\UserActiveScope;
use App\Models\User;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // last way to do model event is Create Observer for specific model
    // run command php artisan make:observer UserObserver --model=User this command will create observer for User model (created,deleted,updated,....)
    // this will trigger created method in observer when user created
    User::create([
        'name' => 'test',
        'email' => 'test@gmail.com',
        'password' => bcrypt('123456789')
    ]);
    // this will trigger Updated method in observer when user created
    $user = User::find(13);
    $user->update([
        'name' => 'test 12',
    ]);
    // this will trigger deleted method in observer when user created
    $user = User::find(13)->delete();
    dump($user);
});
