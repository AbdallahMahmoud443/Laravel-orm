<?php

use App\Models\Post;
use App\Models\Scopes\UserActiveScope;
use App\Models\User;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // how to use relation one-to-one
    /**
     *
     */
    // relation one-to-one form user to phone
    // $user = User::find(1);
    // hint:this way return phone as  dynamic property (model instance)
    // dump($user->phone->phone_number);
    // hint:this way return phone() as  relation method (Query builder instance) and we can use query builder methods
    // dump($user->phone());
    // dump($user->phone()->pluck('phone_number', 'phone_type'));
    // relation one-to-one form phone to user
    $phone = \App\Models\Phone::find(1);
    // dump($phone->user->name); // hint:this way return user as  dynamic property (model instance)
    // dump($phone->user()->value('name')); // hint:this way return user() as  relation method (Query builder instance) and we can use query builder methods
});
