<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title : value() method in Laravel
    // hint: value() method is used to get the value of a (single) instance's variable
    // hint: prefer work with value() with condition to return single instance of model
    // pluck not work correctly with find() method
    // $user = User::find()->pluck('name'); ❌
    // $user = User::find(12)->value('name'); // return value of name column
    // alternative way to get value of name column instead of $user->name
    //important : if found more than one row match condition, it will return the first row

    // $users_1 = User::where('is_admin', 1)->value('name'); // return value of name column of first matching row
    // important : don't use first() method with value() method,it is not efficient
    // $email = User::where('is_admin', '=', 1)->first()->value('email');❌
    $email = User::where('is_admin', '=', 1)->value('email');
    // hint: if you need user first and return only value do this
    $email = User::where('is_admin', '=', 1)->first()?->email;
    dump($email);

    /**
     * first() returns a full model instance, while value('email') extracts just the email string from that model. The second approach (->value('email') directly) is more efficient because it only retrieves the email column from the database instead of the entire record.
     */
});
