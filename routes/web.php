<?php

use App\Models\Post;
use App\Models\User;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: Deleting Methods in Laravel delete(), destroy(), truncate()
    // hint: delete() is used to delete a single record and returns boolean value in case of deleting one record and number of deleted elements in case of deleting multiple records,
    // delete single record used by delete() method
    // $is_deleted = Post::find(7)->delete(); // first should catch the record and then delete it
    //dump($is_deleted); // return true if deleted successfully,false if not deleted
    // delete multiple records used by delete() method
    // $is_deleted = Post::whereIn('id', [8, 9])->delete();
    //dump($is_deleted); // return count of deleted elements, if not deleted return 0
    //-------------------------------------------------------------------//
    // hint: destroy() is used to delete single or multiple records,and returns number of deleted elements in both cases, return 0 if element not deleted  and it doesn't need to call find() method to delete a record
    // delete single record used by destroy() method is static method
    // $is_deleted = Post::destroy(10); // delete record with id 1
    // dump($is_deleted); // return 1 if deleted successfully,0 if not deleted
    // delete multiple records used by destroy() method
    //$is_deleted = Post::destroy([11, 12]); // delete records with id 5 and 6
    // dump($is_deleted); // return 2 if deleted successfully,0 if not deleted
    //-------------------------------------------------------------------//
    // important : delete() vs destroy() with delete hooks
    // delete() work with delete hooks in case of delete single record,but in case of delete multiple records it doesn't work with delete hooks
    // destroy() work with delete hooks in case of delete single record and multiple records
    //-------------------------------------------------------------------//
    // hint: truncate() is used to delete all records (clean table), but it doesn't work with delete
    // $is_truncated = Post::truncate();
    // dump($is_truncated); // return eloquent builder instance
});
