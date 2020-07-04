<?php
namespace App\Repositories\Interfaces;
 
use App\Permission;
 
interface PermissionRepositoryInterface{
    public function all();

    public function find( $id );

    public function store(Array $inputs);
 
    public function update(Permission $permission, Array $inputs);
 
    public function destroy(Permission $permission );
}