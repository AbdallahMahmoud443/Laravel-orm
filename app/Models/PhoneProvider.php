<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhoneProvider extends Model
{
    //
    public function phone()
    {
        return $this->belongsTo(Phone::class);
    }
}
