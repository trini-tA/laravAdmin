<?php

namespace App\Policies;

use App\User;
use App\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct(){
        //
    }

    public function edit(User $user, Role $role ){
        
        return true;
    }
}
