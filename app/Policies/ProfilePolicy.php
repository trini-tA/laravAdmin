<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProfilePolicy{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct(){
    }

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function edit( User $user, User $editUser ){
        
        return auth()->id() === $editUser->id;
    }
}
