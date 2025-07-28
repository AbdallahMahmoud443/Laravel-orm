<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //

    public function reviewable()
    {
        return $this->morphTo(); //morphTo() is a method that allows you to define a polymorphic relationship, return model that owns the review
    }
}
