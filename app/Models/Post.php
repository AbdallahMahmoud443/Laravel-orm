<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;



class Post extends BaseModel
{
    // title: pruning models
    // description: pruning is a way to delete old records from the database
    // first,should used SoftDeletes trait to soft delete to work with soft delete
    // first,should used Prunable trait  to work with prune functionalities
    use HasFactory, SoftDeletes, Prunable;


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
    // prunable method to define which records should be pruned
    public function prunable(): Builder
    {
        // delete all posts that are older than a month
        return static::where('created_at', '<=', now()->subMonth());
    }
    // Prepare the model for pruning. (same as hooks but for prunable trait)
    protected function pruning()
    {
        // usage example: delete all comments related to the post (run before pruning post)
        Log::info("Post is being pruned,it's id is " . $this->id);
    }
}
