<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //

    public function imageable()
    {
        // hint : morphTo() method will return the model that the image belongs to .
        return $this->morphTo();
    }
}
