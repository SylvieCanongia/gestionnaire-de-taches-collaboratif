<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail; // methods for email address verification
use Illuminate\Database\Eloquent\Factories\HasFactory; // generates test data when creating model instances
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable; // email notifications
use Laravel\Sanctum\HasApiTokens; // manages API authentication tokens

class User extends Authenticatable // code for verify email : implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'display_name',
        'profile_image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        //'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // The user can have multiple tasks
    public function tasks()
    {
    return $this->hasMany(Task::class, 'user_id');
    }

    // The user can be invited to several collaborations
    public function invitedCollaborations()
    {
    return $this->hasMany(Collaboration::class, 'invited_user_id');
    }

    // The user can create multiple collaborations
    public function createdCollaborations()
    {
    return $this->hasMany(Collaboration::class, 'inviting_user_id');
    }
}
