<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{


    // define the relationship to the user
    public function user()
    {
        // belongsTo(class,foreignKey,primaryKey); if you don't care about naming conventions
        return $this->belongsTo(User::class);
    }
}
