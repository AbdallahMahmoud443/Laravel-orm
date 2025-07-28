<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //

    public function posts()
    {
        // hint: filtering relation instance based on columns in pivot table
        // filter query via intermediate table (see documentation)
        // every where clause will be applied to the pivot table
        // same query applied in tables, will applied in pivot table as well. like this (see documentation)
        return $this->belongsToMany(Post::class)->wherePivot('post_id', '>', 5)->orderByPivot('created_at', 'desc');
    }
}
