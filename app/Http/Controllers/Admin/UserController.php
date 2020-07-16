<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\RoleRepositoryInterface;

class UserController extends Controller{
    protected $users;

    public function __construct( UserRepositoryInterface $users, RoleRepositoryInterface $roles){
        $this->users = $users;
        $this->roles = $roles;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('admin.user.index', [ 'users' => $this->users->all()] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.user.edit', [ 'user' => null, 'roles' => $this->roles->all() ] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'email' => 'required|unique:users|max:255',
            'password' => 'required_with:min:6|required:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required_with:min:6'
        ]);

        $user = $this->users->store( $request->all() );
        
        return view('admin.user.edit', [ 'user' => $user, 'roles' => $this->roles->all() ] )->with( 'success', __('success user created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        
        $user = $this->users->find($id);
        return view('admin.user.edit', [ 'user' => $user, 'roles' => $this->roles->all() ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            //'email' => 'required|unique:users|max:255',
            'password' => 'required_with:min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required_with:min:6'
        ]);

        $user = $this->users->find($id);
        if( empty( $request->password )){
            $this->users->update(  $user, $request->except( 'password') );
        } else{
            $this->users->update( $user, $request->all() );
        }
        
        return view('admin.user.edit', [ 'user' => $this->users->find($id), 'roles' => $this->roles->all() ] )->with( 'success', __('success user saved'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $this->users->destroy( $this->users->find($id) );
    }

    public function token( $id ){
        $user = $this->users->find($id);
        $token = $user->createToken('token-name');

        dump( $token );
        dd( $user );
    }

    

}
