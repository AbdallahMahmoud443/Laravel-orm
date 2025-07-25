<?php

use App\Models\Post;
use App\Models\User;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: lazy Collection
    // In Laravel ORM, both lazy() and cursor() methods are used for memory-efficient processing of large datasets, but they work differently.
    // description: lazy collection is a collection that is not loaded into memory until it is needed. This can be useful for performance optimization, especially when dealing with large amounts of data.
    //Eager loading is a way to load all the related data at once, while lazy loading is a way to load the related data only when it is needed.
    //hint: lazy collection is useful for performance optimization, especially when dealing with large amounts of data.
    //hint:lazy collection is also useful for reducing the number of database queries, which can improve the performance of the application.
    //hint: lazy collection is also useful for improving the readability and maintainability of the code.
    //hint:lazy collection is also useful for reducing the risk of errors, such as missing related data.
    //$posts = Post::all(); // all() method returns a collection of all the posts at once is cause problems with large amount of data and can lead to performance issues.
    //---------------------------------------------------//
    // hint:The lazy(checks) method retrieves records in chunks and returns a LazyCollection. It's designed to handle large datasets without loading all records into memory at once.
    // case: print large amount of posts, every post print then remove from memory, so we can use lazy() method to load the posts one by one and print them. this lead to performance optimization and reduce the memory usage.
    // $posts = Post::lazy();
    //---------------------------------------------------//
    // hint: cursor() method uses a database cursor to retrieve records one by one. It returns a Generator and is more memory-efficient than lazy() for very large datasets.
    $posts = Post::cursor();
    //---------------------------------------------------//
    // lazy() vs cursor()
    /*
    Use lazy() when:
        -You need Laravel Collection methods
        -Working with medium to large datasets
        -You want to process data in manageable chunks
        -You need to perform operations that benefit from batching
    Use cursor() when:
        -Working with very large datasets
        -Memory usage is critical
        -You're doing simple iteration without complex collection operations
        -You want the most memory-efficient solution

        Both methods are excellent for avoiding memory exhaustion when dealing with large datasets, and the choice between them depends on your specific use case and performance requirements.
     */
    return view('welcome', get_defined_vars());
});
