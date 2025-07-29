<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    use hasFactory;

    public function posts()
    {
        return $this->belongsToMany(Post::class)->wherePivot('post_id', '>', 5)->orderByPivot('created_at', 'desc');
    }
}
