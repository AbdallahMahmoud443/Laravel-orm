<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PostUser extends Pivot
{
    // to create model related to pivot table write command
    // this model same as any models in laravel
    // important php artisan make:model PostUser -m
    public $incrementing = true; // to make incrementing true
    public $primaryKey = 'id';
}
