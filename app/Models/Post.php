<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\MassPrunable;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;
use PDO;

class Post extends BaseModel
{

    use HasFactory, SoftDeletes;


    // defined relationships
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault(['name' => 'unKnown User']);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    // define polymorphic one to one
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable'); // morphOne(modelName,relationName)
    }
    // defined one-to-many polymorphic relationship
    public function review()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }
    // define polymorphic has one  of many
    public function latestReview()
    {
        return $this->review()->one()->ofMany('id', 'max');
    }
    public function types()
    {
        return $this->morphToMany(Type::class, 'typeable'); // morphToMany(modelName,relationName)
    }
}
