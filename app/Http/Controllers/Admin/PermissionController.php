<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\RoleRepository;
use App\Repositories\Interfaces\PermissionRepositoryInterface;
use App\Notifications\NewPermission;

class PermissionController extends Controller{
    protected $roles;
    protected $permissions;

    public function __construct( PermissionRepositoryInterface $permissions, RoleRepository $roles ){
        $this->permissions = $permissions;
        $this->roles = $roles;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('admin.permission.index', [ 'permissions' => $this->permissions->all()] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.permission.edit', [ 'permission' => null] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        
        $validatedData = $request->validate([
            'name' => 'required|unique:permissions|max:255',
            'display_name' => 'required|max:255',
            'description' => 'max:255',
        ]);

        $permission = $this->permissions->store( $request->all() );
        
        return view('admin.permission.edit', [ 'permission' => $permission] )->with( 'success', __('success permission created'));
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
        
        $permission = $this->permissions->find($id);

        auth()->user()->notify( new NewPermission( $permission ) );
        return view('admin.permission.edit', [ 'permission' => $permission] );
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
            'display_name' => 'required|max:255',
            'description' => 'max:255',
        ]);

        $permission = $this->permissions->find($id);
        $this->permissions->update( $permission, $request->all() );
        
        return view('admin.permission.edit', [ 'permission' => $permission] )->with( 'success', __('success permission saved'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $this->permissions->destroy( $this->permissions->find($id) );
    }

    public function assignment( Request $request ){

        // default 
        return view('admin.permission.assignment', [ 'permissions' => $this->permissions->all(), 'roles' => $this->roles->all() ] );

    }

    public function assignmentStore( Request $request ){

        if( $request->permissions ){

            $this->roles->assignment( $request->permissions );
            
        }
        return view('admin.permission.assignment', [ 'permissions' => $this->permissions->all(), 'roles' => $this->roles->all() ] )
            ->with( 'success', __('success assignment saved'));


    }
}
