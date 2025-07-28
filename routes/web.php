<?php

use App\Models\Post;
use App\Models\Scopes\UserActiveScope;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: Has one through relationship
    // case: return phone provider for specific user
    // first way
    // $provider = User::find(2)->phone->provider;
    // second way using has one through relationship
    $provider = User::find(2)->phoneProvider;
    dump($provider);
});
