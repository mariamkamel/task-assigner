<?php

// app/Task.php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\TaskFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected static function newFactory(): Factory
    {
        return TaskFactory::new();
    }
    protected $fillable = ['title', 'description', 'assigned_to_id', 'assigned_by_id'];

    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to_id');
    }

    public function assignedBy()
    {
        return $this->belongsTo(User::class, 'assigned_by_id');
    }
}
