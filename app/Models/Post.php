<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends BaseModel
{
    //
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class); // post belongs to user
    }
}
