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
    // defined has one through relationship
    public function phoneProvider()
    {
        return $this->throughPhone()->hasProvider();
    }
    // defined has many through relationship
    public function comments()
    {
        // first way of define has many through relationship
        // return $this->hasManyThrough(Comment::class, Post::class);
        // second way of define has many through relationship
        // return $this->through('posts')->has('comments');
        // third way of define has many through relationship
        return $this->throughPosts()->hasComments();
    }
}
