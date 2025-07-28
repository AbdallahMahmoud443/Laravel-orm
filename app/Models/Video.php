<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //
    // defined one-to-many polymorphic relationship
    public function review()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }
}
