<?php


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: Eloquent Relationships Operations (sync() & toggle()) work with many to many relationships
    // hint:sync() method is used to sync the pivot table with the given ids
    // hint:toggle() method is used to toggle the given ids in the pivot table
    $post = App\Models\Post::find(2);
    // $post->tags()->sync([1, 2]); // sync the pivot table with the given ids (update the pivot table with given ids)
    // with pivot table data
    // first Way
    //  $post->tags()->sync([1 => ['created_at' => now()], 2 => ['created_at' => now()]]);
    // second Way
    // $post->tags()->syncWithPivotValues([1, 2], ['created_at' => now()]);
    // important case if you want to sync on id = 1 and any additional ids don't remove it
    // syncWithoutDetaching() is used to sync the pivot table with the given ids without removing the existing ids
    $post->tags()->syncWithoutDetaching([1]);
    //--------------------------------------------------//
    // $post->tags()->toggle([1, 2]); // toggle the given ids in the pivot table (add or remove the given ids from the pivot table)
    // with pivot table data
    // $post->tags()->toggle([1 => ['created_at' => now()], 2 => ['created_at' => now()]]);
});
