<?php

use App\Models\User;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: with aggregates function in relationships
    //description: Laravel provides a convenient way to access related data in your Eloquent models using the with method. This method allows you to specify the relationships that you want to preload, and it will automatically load the related data when you access it.
    // hint: withCount() is used to count the number of related records for a given relationship. and return result as new column in parent model
    // hint: withAvg() is used to calculate the average value of a given column in a related table. and return result as new column in parent model
    // hint: withSum() is used to calculate the sum of a given column in a related table. and return result as new column in parent model
    // hint: withMax() is used to get the maximum value of a given column in a related table. and return result as new column in parent model
    // hint: withMin() is used to get the minimum value of a given column in a related table. and return result as new column in parent model
    // hint: withExists() is used to check if a related record exists. and return result as new column in parent model
    // hint: withCountDistinct() is used to count the number of distinct related records for a given relationship. and return result as new column in parent model
    $user_with = User::withCount('posts')->get(); // withCount(relatedModel)
    $user_with_avg = User::withAvg('posts', 'views')->get(); // withAvg(relatedModel, column)
    $user_with_sum = User::withSum('posts', 'views')->get();  //withAvg(relatedModel, column)
    $user_with_max = User::withMax('posts', 'views')->get();  //withAvg(relatedModel, column)
    $user_with_min = User::withMin('posts', 'views')->get();  //withAvg(relatedModel, column)
    $user_with_exists = User::withExists('posts')->get(); // withExists(relatedModel) return 0 => if user has no posts, 1 => if user has posts

    // case if i need to get the number of distinct related records for a given relationship
    $user_with_count_distinct = User::withCount(['posts' => function ($q) {
        return $q->distinct('title'); // or whatever column you want to be distinct
    }])->get(); // withCountDistinct(relatedModel)


    dump(
        $user_with,
        $user_with_avg,
        $user_with_sum,
        $user_with_max,
        $user_with_min,
        $user_with_exists,
        $user_with_count_distinct
    );
});
