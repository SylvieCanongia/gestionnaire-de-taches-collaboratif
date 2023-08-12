<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collaboration extends Model
{
    use HasFactory;

    protected $primaryKey = 'collaboration_id';

    protected $table = 'collaborations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'invitation_status',
        'invitation_date',
        'acceptance_date',
    ];

     /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'list_id',
        'invited_user_id',
        'inviting_user_id',
    ];

     /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    ];

    // Relation with TaskList
    public function taskList()
    {
        return $this->belongsTo(TaskList::class, 'list_id');
    }

    // Relation with Invited User
    public function invitedUser()
    {
        return $this->belongsTo(User::class, 'invited_user_id');
    }

    // Relation with Inviting User
    public function invitingUser()
    {
        return $this->belongsTo(User::class, 'inviting_user_id');
    }
}
