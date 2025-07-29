<?php

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title Relational Factories (Many to Many relationships)
    // create one dummy post with 3 dummy  tags
    // first way
    // Post::factory()->has(Tag::factory()->count(3))->count(1)->create();
    // second way
    // create one dummy post with 2 dummy  tags with created_at = now
    // hasAttached() is used to set the created_at attribute of the relationship in factory
    // Post::factory()->hasAttached(Tag::factory()->count(2), ['created_at' => now()])->count(1)->create();
    // third way
    Post::factory()->hasTags(Tag::factory()->count(2))->count(1)->create();
    // important every thing applied on normal relation in applied in polymorphic relation (see documentation)
});
