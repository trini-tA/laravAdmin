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
        return $this->user->create($inputs);
    }
 
    public function update(User $user, Array $inputs){
        if( isset( $inputs['password']) ){
            $inputs['password'] = bcrypt($inputs['password']);
        }
        $user->update($inputs);

    }
 
    public function destroy(User $user){
        $user->delete();

    }
}