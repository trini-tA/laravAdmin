<?php

namespace App\Repositories;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\User;

class UserRepository{
    protected $user;
 
    public function __construct(User $user){
        $this->user = $user;
    }

    public function all(  ){
        return $this->user->all( );
    }

    public function find( $id ){
        return $this->user->findOrFail( $id );
    }

    public function store(Array $inputs){
        $inputs['password'] = bcrypt($inputs['password']);

        $user = $this->user->create($inputs);
        if( isset( $inputs['roles'] ) ){
            $user->detachRoles($user->roles);
            $user->attachRoles( array_keys( $inputs['roles'] ) );
        }

        return $user;
    }
 
    public function update(User $user, Array $inputs){
        if( isset( $inputs['password']) ){
            $inputs['password'] = bcrypt($inputs['password']);
        }
        $user->update($inputs);

        if( isset( $inputs['roles'] ) ){
            $user->detachRoles($user->roles);
            $user->attachRoles( array_keys( $inputs['roles'] ) );
        }
    }
 
    public function destroy(User $user){
        $user->delete();

    }
}