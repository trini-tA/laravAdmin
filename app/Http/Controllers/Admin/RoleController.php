<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\RoleRepository;

class RoleController extends Controller{
    protected $roles;

    public function __construct( RoleRepository $roles){
        $this->roles = $roles;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('admin.role.index', [ 'roles' => $this->roles->all()] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.role.edit', [ 'role' => null] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        
        $validatedData = $request->validate([
            'name' => 'required|unique:roles|max:255',
            'display_name' => 'required|max:255',
            'description' => 'max:255',
        ]);

        $role = $this->roles->store( $request->all() );
        
        return view('admin.role.edit', [ 'role' => $role] )->with( 'success', __('success role created'));
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
        
        $role = $this->roles->find($id);
        return view('admin.role.edit', [ 'role' => $role] );
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

        $role = $this->roles->find($id);
        $this->roles->update( $role, $request->all() );
        
        return view('admin.role.edit', [ 'role' => $role] )->with( 'success', __('success role saved'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $role = $this->roles->find($id);

        if( !in_array( $role->name, config( 'laratrust.panel.roles_restrictions')['not_deletable'] ) ){
            $this->roles->destroy( $role );
        } else {
            abort( 405 );
        }
    }

}
