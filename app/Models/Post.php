<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Log;



class Post extends BaseModel
{
    //
    use HasFactory;


    // defined relationships
    public function user()
    {
        return $this->belongsTo(User::class); // post belongs to user
    }

    // booted method to run code when model is booted
    public static function booted()
    {
        // defined delete hooks
        static::deleting(function (Post $post) {
            Log::info("Post is being deleted,it's id is " . $post->id);
        });
        static::deleted(function (Post $post) {
            Log::info("Post has been deleted,it's id is " . $post->id);
        });
    }
}
