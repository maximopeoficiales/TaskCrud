<?php

namespace App\Policies;

use App\User;
use App\Task;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */

    /* El usuario activo tiene que tener el mismo id que las tareas */
    public function verify(User $user,Task $task)
    {
        return $user->id=== $task->user_id;
    }
}
