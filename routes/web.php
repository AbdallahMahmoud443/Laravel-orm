<?php

use App\Models\Post;
use App\Models\Review;
use App\Models\Scopes\UserActiveScope;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: polymorphic has one-of-many relationship
    // description:  polymorphic has one-of-many relationship is a relationship where a model can belong to more than one model on a single association. For example, a photo can belong to an album or a blog post.
    $latest_review = Post::find(1)->latestReview()->pluck('content', 'id');
    dump($latest_review);
});
