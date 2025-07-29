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
        return $this->throughPosts()->hasComments();
    }
    // define polymorphic one to one
    public function image()
    {
        // hint morphOne() is a polymorphic one to one relationship
        return $this->morphOne(Image::class, 'imageable'); // morphOne(modelName,relationName)
    }

    // defined Accessors & Mutators
    // Accessors is used to get the value of a property when it is accessed.
    // make new Accessor called FullName to get the full name of the user. in lower format
    // first way
    /*   public function getFullNameAttribute()
    {
        return strtolower($this->name);
    }*/

    // do change of returned value of exits property with same name of property
    // second way
    /* public function name(): Attribute
    { // name is exits property
        return Attribute::make(get: fn($v) => strtolower($v));
    }*/
    // Mutators is used to set the value of a property when it is set.
    // first way (Mutator only)
    /*
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }
    */
    // second way (Accessor & Mutator)
    public function name(): Attribute
    { // name is exits property
        return Attribute::make(get: fn($v) => strtolower($v), set: fn($v) => strtolower($v));
    }
}
