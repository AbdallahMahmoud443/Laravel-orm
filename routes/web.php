<?php

use App\Models\Post;
use App\Models\User;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: subquery in laravel
    // description: subquery is a query inside another query, it is used to fetch data from multiple tables and display it in a single query result.
    // hint: to work with subquery in laravel orm ,should use addSelect() or select() methods.
    // hint: use select() to identify the columns that will be fetched from the subquery.
    // hint: use whereColumn() method to compare two columns in subquery.
    // case: if I need to fetch all users and their last post , I can use subquery to fetch the last post  for each user and display it in the same query result.
    // addSelect([column_name => query]) method is used to add a column to the query result.
    // important: don't use get() method inside addSelect() method, because it will return the subquery result instead of the main query result.
    // use orderByDesc() method to order the subquery result in descending order.
    // use limit() method to limit the subquery result to the last row only.

    $users = User::addSelect(
        [
            'last_post_title' =>
            Post::select('title')->whereColumn('user_id', 'users.id')->orderByDesc('id')->limit(1)
        ]
    )->get(); // return user with new column last_post_title contain the title of the last post for each user.
    dump($users);
});
