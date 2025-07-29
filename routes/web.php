<?php


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: Eloquent Relationships Operations (Inline Existence Queries) => (see documentation for more info)
    // description: Laravel provides a convenient way to check if a relationship exists without actually loading it into memory using the exists method. Inline Existence Queries is a feature that allows you to perform existence checks on relationships directly in your query, without the need for additional queries or conditional statements.
    // whereRelation(relation,column,operator,value)
    // case return all users who have posts with title containing 'learn'
    $users = App\Models\User::whereRelation('posts', 'title', 'like', '%learn%')->get();
    dump($users);
    //-----------------------------------------------------------------------------------//
    // case return all users who have posts with likes greater than 200
    $users = App\Models\User::whereRelation('posts', 'likes', '>', 200)->get();
    dump($users);
});
