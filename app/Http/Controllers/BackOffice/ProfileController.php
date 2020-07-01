<?php

namespace App\Http\Controllers\BackOffice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdate;
use App\Repositories\UserRepository;
use App\Repositories\RoleRepository;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller{
    protected $users;

    public function __construct(UserRepository $users, RoleRepository $roles){
        $this->middleware('auth');
        $this->users = $users;
        $this->roles = $roles;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( request $request, $id ){
        $user = $this->users->find($id);
        
        $this->authorize( 'edit', $user );

        return view('backoffice.profile.edit', [ 'user' => $user, 'roles' => $this->roles->all() ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( ProfileUpdate $request, $id ){
        

        $user = $this->users->find($id);
        if( empty( $request->password )){
            $this->users->update(  $user, $request->except( 'password'), false );
        } else{
            $this->users->update( $user, $request->all(), false );
        }
        
        return view('backoffice.profile.edit', [ 'user' => $this->users->find($id), 'roles' => $this->roles->all() ] )->with( 'success', __('success user saved'));

    }
}
