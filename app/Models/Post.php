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
        // if you not care about naming conventions
        //belongsToMany(Model,post_tag,tag_id,post_id)
        return $this->belongsToMany(Tag::class);
    }
    // define polymorphic one to one
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable'); // morphOne(modelName,relationName)
    }
}
