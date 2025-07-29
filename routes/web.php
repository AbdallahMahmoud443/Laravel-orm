<?php


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title Relational Factories
    // return one user with 3 posts (Has many relationships)
    // first way
    //  App\Models\User::factory()->has(App\Models\Post::factory()->count(3))->count(1)->create();
    // second way (hasNameOfRelationship)
    // hasPosts(number,[default attributes=>value])
   //  App\Models\User::factory()->hasPosts(2, ['likes' => 2])->count(1)->create();
});
