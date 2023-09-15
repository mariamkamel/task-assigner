<?php


// app/User.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\UserFactory;
 

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected static function newFactory(): Factory
    {
        return UserFactory::new();
    }
    protected $fillable = ['name', 'email', 'is_admin'];

    public function tasksAssigned()
    {
        return $this->hasMany(Task::class, 'assigned_to_id');
    }

    public function tasksCreated()
    {
        return $this->hasMany(Task::class, 'assigned_by_id');
    }
    public function statistics()
    {
        return $this->hasOne(Statistics::class);
    }
}

