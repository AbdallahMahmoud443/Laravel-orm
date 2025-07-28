<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;


use Illuminate\Database\Eloquent\Factories\HasFactory;
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
    //  define All Relations Here
    // (One-to-many)
    public function posts()
    {
        return $this->hasMany(Post::class); // one to many
    }
    // (One-to-One)
    public function phone()
    {
        return $this->hasOne(Phone::class); // one to one
    }
    //defined has one of many relationship (second way)
    public function latestPost()
    {
        // there are many of ways to define this relationship
        // return $this->posts()->orderBy('id', 'desc')->first();
        //---------------------------------------------------------------//
        // latestOfMany() arrange instance based on created_at by default
        // latestOfMany(column) arrange instance based on column
        // return $this->hasOne(Post::class)->latestOfMany('likes'); // latestOfMany() vs oldestOfMany()
        //---------------------------------------------------------------//
        // ofMany(column, max or min) arrange instance based on created_at by default
        // return $this->hasOne(Post::class)->ofMany('likes', 'min');
        //---------------------------------------------------------------//
        // one() Convert the relationship to a "has one" relationship.
        // return $this->posts()->one()->ofMany('likes', 'max');
    }
}
