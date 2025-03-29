<?php

namespace Modules\Task\App\Models;

use Modules\Task\App\Models\Task;
use Modules\User\App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Task\Database\Factories\ListManagementFactory;

class ListManagement extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['user_id', 'name'];
    protected $table = 'lists';

    // Relationship with User
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }


    // protected static function newFactory(): ListManagementFactory
    // {
    //     // return ListManagementFactory::new();
    // }
}
