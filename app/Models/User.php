<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Scopes\UserActiveScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Log;

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

    public static function booted(): void
    {
        // defined Events using Closures in the boot method see documentations for more info
        // there are some Closures related to models like (retrieved, creating, created, updating, updated, saving, saved, deleting, deleted, forceDeleted)
        // every closures end with ing this mean the event is triggered before the action happens
        // every closures end with ed this mean the event is triggered after the action happens
        // example: creating is triggered before the user is created
        static::creating(function ($user) {
            // do something
            Log::info('Creating user with id is' . $user->id); // id not appear because the user is not created yet
        });
        // example: created is triggered after the user is created
        static::created(function ($user) {
            // do something
            Log::info('Created user with id is' . $user->id); // id appear because the user is created
        });
    }
}
