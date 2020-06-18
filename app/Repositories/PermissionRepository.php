<?php

namespace App\Repositories;
use App\Permission;
use App\Repositories\PermissionRepository;

class PermissionRepository{
    protected $permission;
 
    public function __construct(permission $permission){
        $this->permission = $permission;
    }

    public function all(  ){
        return $this->permission->all( );
    }

    public function find( $id ){
        return $this->permission->findOrFail( $id );
    }

    public function store(Array $inputs){
        return $this->permission->create($inputs);
    }
 
    public function update(permission $permission, Array $inputs){
        $permission->update($inputs);
    }
 
    public function destroy(permission $permission ){
        $permission->delete();

    }
}