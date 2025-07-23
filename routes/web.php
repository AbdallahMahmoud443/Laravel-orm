<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // hint: updateOrCreate(condition,data) return Instance (Work With eloquent ORM)
    /**
     * Condition => True  Update Instance
     * Condition => False Create Instance
     */
    // important: take care about non-nullable fields

    // case 1 : Condition => false (create new Instance (John Doe Updated,john5@gmail.com))
    /*  $user = User::updateOrCreate(['email' => 'john5@gmail.com'], [
        'name' => 'John Doe Updated',
        'password' => '12345678'
    ]);*/

    // case 2 : Condition => True (Update Instance)
    /* $user = User::updateOrCreate(['email' => 'john5@gmail.com'], [
        'name' => 'John Doe',
    ]);*/
    // hint: updateOrInsert(condition,data) return boolean  (Work With Query Builder and eloquent ORM)
    // important prefer use updateOrInsert() with Query Builder, as same as updateOrCreate() In Usage
    // note: return true with (update or insert), false when not do operating
    // case 2 : Condition => True (Update Instance)
    $user = DB::table('users')->updateOrInsert(['email' => 'john7@gmail.com'], [
        'name' => 'John Doe',
        'password' => '12345678' // with create should provide password because it isn't nullable field

    ]);
    // case 1 : Condition => false (create new Instance (John Doe Updated,john7@gmail.com))
    dump($user);
});
