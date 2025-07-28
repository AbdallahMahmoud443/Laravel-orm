<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //
    public function getPosts()
    {
        return $this->morphedByMany(Post::class, 'typeable');
    }
    public function getVideos()
    {
        return $this->morphedByMany(Video::class, 'typeable');
    }
}
