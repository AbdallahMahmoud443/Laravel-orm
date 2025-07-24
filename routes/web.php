<?php

use App\Models\User;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title : take() vs limit()
    // description: take() will return all the records from the database while limit() will return only the specified number of records from the database.
    // hint: take() is faster than limit() because it does not need to count the total number of records in the database.
    // hint: take() is more flexible than limit() because it can take negative values and it can be used with collections.
    // hint: limit() is more efficient than take() because it does not need to load all the records from the database into memory.
    $users_1 = User::take(5)->get();
    $users_2 = User::limit(5)->get();
    dump($users_1, $users_2);
    /**
     * Use take() when:
        Working with Collections (only option)
        Need negative values (take from end)
        Want consistent API across collections and queries
        Laravel/Eloquent focused development
    Use limit() when:
        pure SQL mindset (more familiar to SQL developers)
        Working only with Query Builder
        Team preference for SQL-like syntax
        Database-specific operations
     */
    // title : skip() vs offset()
    // description: skip() will skip the specified number of records from the beginning of the result set while offset() will skip the specified number of records from the end of the result set.
    // hint : offset() is more efficient than skip() when you want to skip a large number of records.
    // hint : skip() is more efficient than offset() when you want to skip a small number of records.
    $users_1 = User::skip(3)->take(5)->get();
    $users_2 = User::offset(3)->limit(5)->get();
    dump($users_1, $users_2);
});
