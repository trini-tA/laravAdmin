<?php
namespace App\Repositories\Interfaces;
 
use App\Role;
use App\Permission;
 
interface RoleRepositoryInterface{
    
    public function all( );

    public function find( $id );

    public function store(Array $inputs);
 
    public function update(Role $role, Array $inputs);
 
    public function destroy(Role $role );

    public function assignment( $inputPermissions );
}