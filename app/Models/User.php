<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;


use Illuminate\Database\Eloquent\Casts\Attribute;
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
        return $this->throughPosts()->hasComments();
    }
    // define polymorphic one to one
    public function image()
    {
        // hint morphOne() is a polymorphic one to one relationship
        return $this->morphOne(Image::class, 'imageable'); // morphOne(modelName,relationName)
    }
    // casting is used to convert the (data type of a column) to a specific type
    // casting work as a getter and setter for attributes
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        // see documentation for more details about casting type
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            // hint: I will cast is_admin attribute to boolean
            'is_admin' => 'boolean',
        ];
    }
}
