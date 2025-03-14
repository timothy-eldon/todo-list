<?php

namespace Modules\Task\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\User\App\Models\User;

// use Modules\Task\Database\Factories\TaskFactory;

class Task extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'descriptioin',
        'user_id'
    ];

    // protected static function newFactory(): TaskFactory
    // {
    //     // return TaskFactory::new();
    // }

    public function user(){
        return $this->BelongsTo(User::class, 'user_id', 'id');
    }
}
