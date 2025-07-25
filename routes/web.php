<?php

use App\Models\User;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title chunk() and chunkById()
    // hint: chunk() is used to split the collection into smaller chunks of a specified size.
    // hint: chunk() and chunkById() are used to split the collection into smaller chunks of a specified size. The difference between the two is that chunk() takes a size parameter, while chunkById() takes a size parameter and an optional ID parameter.
    $users = User::all()->chunk(2); // return array of arrays each array has 2 users (work with collections)
    // dump($users);

    // if i need to do something with each chunk,process data of users chunk by chunk
    // useful when you have a large collection and you want to process it in smaller chunks to avoid memory issues or to improve performance.
    $users = User::chunk(2, function ($users) {
        /* foreach ($users as $user) {
            // do something with each user
        }*/
        // dump($users);
    });
    //------------------------------------------------//
    // hint: chunkById() is used to split the collection into smaller chunks of a specified size, but it also takes an optional ID parameter. it uses the ID parameter to determine the starting point of the chunk. This can be useful when you want to split the collection into chunks that are ordered by a specific column, such as an ID column. For example:
    $users = User::orderBy('id')->chunkById(2, function ($users) {
        dump($users); // useful for updating or deleting a large number of records in a database
    }, 'id'); // id is the column name (Primary Key) that you want to use to split the collection into chunks
});
