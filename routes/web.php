<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // finally to run pruning functionality we need to run this command in terminal
    /*
        php artisan model:prune  used to delete old post based on query return form prunable method in Post model
        php artisan model:prune --pretend used to see how many records will be deleted
        can run this command in terminal, or using Artisan class, or in crone jobs in server in production mode
    */
    // Artisan::call(command, [options]);
    // Artisan::call('model:prune', ['--model' => Post::class, '--pretend' => true]);
    // important: pruning run hooks (deleting,deleted,pruning) in post model
    Artisan::call('model:prune'); // will delete old post based on query return form prunable method in Post model when hit route
});
