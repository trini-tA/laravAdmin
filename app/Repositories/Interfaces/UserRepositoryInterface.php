<?php
namespace App\Repositories\Interfaces;
 
use App\User;
 
interface UserRepositoryInterface{
    public function all();

    public function find( $id );

    public function store(Array $inputs);

    public function update(User $user, Array $inputs, $updateRole = true );

    public function destroy(User $user);
}