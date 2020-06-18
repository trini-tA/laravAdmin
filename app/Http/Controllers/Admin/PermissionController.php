<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PermissionRepository;;

class PermissionController extends Controller{
    protected $permissions;

    public function __construct( permissionRepository $permissions){
        $this->permissions = $permissions;
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
}
