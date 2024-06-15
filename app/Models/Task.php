<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'status', 'due_date', 'user_id', 'category_id','priority'];

    protected $dates = [
        'due_date', // Ensure due_date is cast to Carbon instance
    ];
    /**
     * Get the user that owns the task.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the category that owns the task.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
