<?php

use App\Models\Post;
use App\Models\Scopes\UserActiveScope;
use App\Models\User;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: Anonymous Global scope function
    // description: global scope function is a function that is applied to all queries that are made to the database. It is used to add additional conditions to the query, such as filtering out deleted records or adding a default order by clause.
    // important removing global scope function
    // withoutGlobalScopes() vs withoutGlobalScope()
    // hint withoutGlobalScopes() is used to delete one or more global scopes,otherwise withoutGlobalScope() remove only one global scope
    // $users = User::withoutGlobalScopes()->get(); // remove all global scopes belong to User Model
    // $users = User::withoutGlobalScopes([UserActiveScope::class])->get(); // remove UserActiveScope global scopes only belong to User Model
    // $users = User::withoutGlobalScopes(['activeUser'])->get(); // remove userActive anonymous global scopes only belong
    $users = User::withoutGlobalScopes(['activeUser', UserActiveScope::class])->get(); // remove userActive anonymous scope and UserActiveScope  scope
    dump($users);
});
