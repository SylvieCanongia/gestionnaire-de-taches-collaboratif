<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $primaryKey = 'task_id';

    protected $table = 'tasks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'task_title',
        'task_description',
        'due_date',
        'priority_id',
        'list_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'user_id',
    ];

     /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    ];

    // Relation with Priority
    public function priority()
    {
        return $this->belongsTo(Priority::class, 'priority_id');
    }
    
    // Relation with TaskList designates the task list to which the task belongs
    public function taskList()
    {
        return $this->belongsTo(TaskList::class, 'list_id');
    }

    // Relation with User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
