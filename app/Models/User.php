<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;





use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $guarded = ['id'];
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

    public function posts()
    {
        return $this->hasMany(Post::class); // one to many
    }
    // defined local scope called premium users with deposit >= 5000
    // this is used to  filter users with deposit >=
    // should start with scope and then the name of the scope
    public function scopePremium(Builder $query) // $query is the query builder
    {
        $query->where('deposit', '>=', 5000);
    }
    // local scope defined to get admins (custom local scope)
    public function scopeType(Builder $query, string $type = 'user')
    {
        $user_type = $type == 'user' ? 0 : 1;
        $query->where('is_admin', $user_type);
    }
}
