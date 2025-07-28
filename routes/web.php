<?php

use App\Models\Post;
use App\Models\Scopes\UserActiveScope;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: polymorphic one-to-many relationship
    // description:  polymorphic one-to-many is a way to define a one-to-many relationship where the related model can belong to more than one type of model.
    // case 1: return all review of post id = 1
    $reviews_post_1 = App\Models\Post::find(1)->review()->pluck('content')->toArray();
    dump($reviews_post_1);
    // case 1:  return all review of video id = 1
    $reviews_video_1 = App\Models\Video::find(1)->review()->pluck('content')->toArray();
    dump($reviews_video_1);
    // case 2: return all review of post id = 1 and video id = 1
    // whereHasMorph() is used to filter the related models based on the morph type and the morph id.
    $reviews = App\Models\Review::whereHasMorph('reviewable', ['App\Models\Post', 'App\Models\Video'], function ($query) {
        $query->where('id', 1);
    })->pluck('content', 'reviewable_type')->toArray();
    dump($reviews);

    // case 3: return latest review of post id = 1
    // whereHasMorph(relation, [morph type], callback) is used to filter the related models based on the morph type and the morph id.
    $latest_review = App\Models\Review::whereHasMorph('reviewable', 'App\Models\Post', function ($query) {
        $query->where('reviewable_id', 1)->latest();
    })->first();
    dump($latest_review);
    // case 4: return latest review of video id = 1
    $name_of_model = App\Models\Review::find(1)->printNameModel();
    dump($name_of_model);
});
