<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //

    public function posts()
    {
        // pivot table options return relation with pivot table withPivot(columns)
        // withTimestamps() return created_at and updated_at of pivot table
        // as() is method to put custom name to pivot table
        return $this->belongsToMany(Post::class)->as('CustomPostComments')->withPivot('tag_id', 'post_id')->withTimestamps();
    }
}
