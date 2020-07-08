<?php

namespace App\Repositories;
use App\Permission;

use App\Repositories\Interfaces\PermissionRepositoryInterface;

class PermissionRepository implements PermissionRepositoryInterface{
    protected $permission;
 
    public function __construct(Permission $permission){
        $this->permission = $permission;
    }

    public function all(  ){
        return $this->permission->all( );
    }

    public function find( $id ){
        return $this->permission->findOrFail( $id );
    }

    public function store(Array $inputs){
        $permission = $this->permission->create($inputs);

        return $permission;
    }
 
    public function update(Permission $permission, Array $inputs){
        $permission->update($inputs);
    }
 
    public function destroy(Permission $permission ){
        $permission->delete();

    }
}