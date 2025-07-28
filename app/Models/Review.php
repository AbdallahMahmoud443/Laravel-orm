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
    // custom method to print the name of the model that owns the review
    public function printNameModel()
    {
        $relation = $this->reviewable;

        if ($relation instanceof Post) {
            return $relation->title;
        }
        if ($relation instanceof Video) {
            return $relation->title;
        }
        return null;
    }
}
