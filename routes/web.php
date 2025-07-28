<?php

use App\Models\Post;
use App\Models\Scopes\UserActiveScope;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title:Retrieving relation rule
    /**
     *  case of returned Relation
     * instance->relation->property =>  is called Dynamic Property
     * instance->relation()->anyChainOfModelOperations => is Query Builder Collection
     */
    // Example: return sum of (withdraw + deposit) of user has specific phone number it's id = 2
    $phone = App\Models\Phone::find(2);
    $sum_operations = $phone->user()->sum(DB::raw('withdraw + deposit'));
    dump($sum_operations);
});
