<?php

namespace App\Policies;

use App\User;
use App\Batch;
use Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class BatchPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function admin(User $user, Batch $batch):bool
    {   
        return $user->user_role == 1;
    }
}
