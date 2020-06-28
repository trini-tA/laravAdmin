<?php

namespace App\Repositories;
use App\Role;
use App\Permission;

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

    public function assignment( $inputPermissions ){
        foreach( $inputPermissions as $role => $permissions ) {
            $role = $this->role->find( $role );
            $role->detachPermissions();
            foreach( $permissions as $id => $checked ){
                $role->attachPermission( Permission::where( 'id', $id )->first()->name );
            }

        }
    }
}