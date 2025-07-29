<?php

use App\Models\Post;
use App\Models\Review;
use App\Models\Tag;
use App\Models\Video;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title Relational Factories (Many to Many relationships)

    // important every thing applied on normal relation in applied in polymorphic relation (see documentation)
    // MorphMany()
    $post = Post::factory()->hasReview(3)->create();
    // MorphTo()
    $reviews = Review::factory()->count(3)->for(
        Post::factory(), // must only one factory
        'reviewable'
    )->create();
    // MorphToMany()
    $videos = Video::factory()
        ->hasAttached(
            Tag::factory()->count(3),
            ['public' => true]
        )
        ->create();
});
