<?php


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: data serialization
    // serialization in laravel is the process of converting an object into a array or json
    $user = App\Models\User::find(2)->with('posts')->first();
    dump($user->toArray()); // return relations with all attributes as array
    dump($user->attributesToArray()); // doesn't return relations,but return all attributes as array
    dump($user->toJson()); // return attributes with all attributes as json
});
