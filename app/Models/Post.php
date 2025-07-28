<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\MassPrunable;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;



class Post extends BaseModel
{

    use HasFactory, SoftDeletes;


    // defined relationships
    public function user()
    {
        // with default behavior
        // withDefaults() is used to set default values for the relationship
        // work only with method belongTo
        return $this->belongsTo(User::class)->withDefault(['name' => 'unKnown User']);
    }
}
