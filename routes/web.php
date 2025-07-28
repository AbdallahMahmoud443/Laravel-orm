<?php

use App\Models\Post;
use App\Models\Review;
use App\Models\Scopes\UserActiveScope;
use App\Models\Tag;
use App\Models\Type;
use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: polymorphic has many-of-many relationship
    // description : polymorphic has many-of-many relationship is a type of relationship where a model can belong to many different models and a model can have many different types of relationships with other models. This type of relationship is useful when you want to create a flexible and scalable system that can handle a wide range of relationships between different models.
    /*
    // get types of post id = 1
    $post = Post::find(1);
    dump($post->types()->pluck('name'));
    // get types of post id = 2
    $post = Post::find(2);
    dump($post->types()->pluck('name'));
    // get types of video id = 1
    $video = Video::find(1);
    dump($video->types()->pluck('name'));
    // get types of video id = 2
    $video = Video::find(2);
    dump($video->types()->pluck('name'));*/

    // get post of type id = 1
    $posts = Type::find(1)->getPosts()->pluck('title')->toArray();
    dump($posts);
    // get post of type id = 2
    $posts = Type::find(2)->getPosts()->pluck('title')->toArray();
    dump($posts);
    // get post of type id = 1
    $videos = Type::find(1)->getVideos()->pluck('title')->toArray();
    dump($videos);
    // get post of type id = 2
    $videos = Type::find(2)->getVideos()->pluck('title')->toArray();
    dump($videos);
});
