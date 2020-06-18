<?php

namespace App\Repositories;
use App\Role;
use App\Repositories\UserRepository;

class RoleRepository{
    protected $role;
 
    public function __construct(Role $role){
        $this->role = $role;
    }

    public function all(  ){
        return $this->role->all( );
    }

    public function find( $id ){
        return $this->role->findOrFail( $id );
    }

    public function store(Array $inputs){
        return $this->role->create($inputs);
    }
 
    public function update(Role $role, Array $inputs){
        $role->update($inputs);
    }
 
    public function destroy(Role $role ){
        $role->delete();

    }
}