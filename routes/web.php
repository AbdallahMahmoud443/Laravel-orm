<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // title: Attribute Internal States
    $user = User::find(1); // return Instance of User Model
    // hint: isClean(attributes) checking  User Instance or it's attributes was changed or not before saving it in database
    /**
     * return => true if instance wasn't changed
     * return => false if instance was changed
     */
    // dump($user->isClean()); // return true
    // $user->name = 'Ali Ahmed';
    // dump($user->isClean(['name'])); // return false
    // dump($user->getOriginal('name')); // return value of name before update
    //---------------------------------------------------------------//
    // hint: isDirty(attributes) checking  User Instance or it's attributes was changed or not before saving it in database, it opposite of isClean()
    /**
     * return => true if instance was changed
     * return => false if instance wasn't changed
     */
    // dump($user->isDirty()); // return false
    // $user->name = 'Ali Ahmed';
    // dump($user->isDirty(['name'])); // return true
    //---------------------------------------------------------------//
    // hint: wasChanged(attributes) checking  User Instance or it's attributes was changed or not after saving it in database
    /**
     * return => false if instance wasn't changed
     * return => false if instance was changed and not save in database
     * return => true if instance was changed and save in database
     */
    dump($user->wasChanged()); // return false
    $user->name = 'Ali Ahmed';
    dump($user->wasChanged(['name'])); // return false
    $user->save();
    dump($user->wasChanged(['name'])); // return true
});
