<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Task;
use App\Models\Category;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    /**
     * Create a new policy instance.
     */
    use HandlesAuthorization;

    public function view(User $user, Task $task,)
    {
        return $user->id === $task->user_id;
    }

    public function update(User $user, Task $task)
    {
        return $user->id === $task->user_id;
    }

    public function delete(User $user, Task $task)
    {
        return $user->id === $task->user_id;
    }
    
}
