<?php

use App\Models\Post;
use App\Models\Scopes\UserActiveScope;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: polymorphic one-to-one relationship
    // description: polymorphic is a way to define a one-to-one relationship where the related model can belong to more than one type of model.
    // case 1: return image of post id = 1
    $post_image_1 = Post::find(1)->image;
    dump($post_image_1->path);
    // case 1: return image of post id = 2
    $post_image_2 = Post::find(2)->image;
    dump($post_image_2->path);
    // case 2: return image of user id = 1
    $user_image_1 = User::find(2)->image;
    dump($user_image_1->path);
    // case 3 : return post from image id = 1
    $user = App\Models\Image::find(1)->imageable; // return Model Instance based on the type of the model
    dump($user->name);
});
