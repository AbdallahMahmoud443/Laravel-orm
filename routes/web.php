<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title :  when(condition, callback=>true, callback=>false) method in laravel orm
    // description : The when method allows you to conditionally run a query clause such as where, orWhere, having, or orWhereHaving. The callback provided to the when method will receive the query builder instance, allowing you to add additional constraints to the query.
    // hint: when method is useful when you want to add a condition to a query based on a variable value. For example, you can use the when method to add a where clause to a query only if a certain condition is true.
    // usage in filtering
    $is_admin = 1;
    $users = User::when($is_admin == 1, function ($q) use ($is_admin) {
        return $q->where('is_admin', $is_admin);
    }, function ($q) use ($is_admin) {
        return $q->where('is_admin', $is_admin);
    })->get();
    dump($users);
});
