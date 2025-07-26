<?php

use App\Models\Post;
use App\Models\User;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: soft delete
    // description: soft delete is a way to delete a record from the database but not permanently. The record is still in the database but marked as deleted. This is useful when you want to restore the record later.
    // to soft delete a record, you can use the delete() method on the model instance. For example:
    //  $post = Post::find(1)->delete(); // soft delete the post with id 1, deleted_at will be set to the current timestamp
    //---------------------------------------//
    // to restore a soft deleted record, you can use the restore() method on the model instance. For example:
    // important:onlyTrashed() used for get record with deleted_at,withTrashed() used for get records with deleted_at and active
    // $post = Post::onlyTrashed()->find(1)->restore(); // restore the post with id 1, deleted_at will be set to null
    // dump($post); // return true
    //---------------------------------------//
    // to permanently delete a soft deleted record, you can use the forceDelete() method on the model instance. For example:
    // $post = Post::onlyTrashed()->find(1)->forceDelete(); // permanently delete the post with id 1, the record will be removed from the database
    // dump($post); // return true
});
