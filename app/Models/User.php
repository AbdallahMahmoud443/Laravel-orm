<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
// important: php artisan model:show User
use Database\Factories\AdminFactory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    // hint : use HasUuids Trait to generate uuid values for each column
    // hint: Uuids important for Security and merging of tables
    use HasFactory, Notifiable, SoftDeletes, HasUlids;
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * need to add this line when table not match convention of laravel
     */
    // code: protected $table = 'users';


    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Generate more that ulids in one table
     *
     * @return string
     */

    public function uniqueIds()
    {
        return ['id', 'access']; // return array of columns name
    }
}
