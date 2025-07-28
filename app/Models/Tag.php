<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //

    public function posts()
    {
        // if you not care about naming conventions
        //belongsToMany(Model,post_tag,post_id,tag_id)
        return $this->belongsToMany(Post::class);
    }
}
