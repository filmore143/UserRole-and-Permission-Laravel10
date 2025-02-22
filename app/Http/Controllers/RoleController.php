<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:role-list|role-create|role-show|role-update|role-delete', ['only' => ['index', 'show']]); //display index and show
        $this->middleware('permission:role-create', ['only' => ['create', 'store']]); //display create and store
        $this->middleware('permission:role-show', ['only' => ['show']]);  ///display only show
        $this->middleware('permission:role-update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
        $this->middleware('permission-permission-sync', ['only' => ['syncPermissions', 'rolePermissions']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Role::all();
        return view('dashboard.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $permissions = Permission::all();
        return view('dashboard.role.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $role = Role::create(['name'=> $request->input('name'), 'guard_name' => 'web']);
        $permissions = Permission::whereIn('id', $request->input('permission'))->get();
        foreach($permissions as $permission)
        {
            $role->syncPermissions($permission);
        }
        return redirect()->route('role.index')->with('message', 'Role Created Successfully');
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
        $role = Role::find($id);
        $rolePermissions = $role->permissions->pluck('name');

        return view('dashboard.role.show', compact('role', 'rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $role = Role::find($id);
        $permissions =  Permission::all();

        return view('dashboard.role.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $role = Role::find($id);
        $role->name=$request->input('name');
        $role->save();

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // $role->givePermissionTo(['name' => $request->input('permission'), 'guard_name' => 'web']);


        $permissions = Permission::whereIn('id', $request->input('permission'))->get();
        foreach($permissions as $permission)
        {
            $role->syncPermissions($permission);
        }
        return redirect()->route('role.index')->with('message', 'Role Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $role = Role::find($id);


        $permissions = Permission::all();
        foreach($permissions as $permission)
        {
            $role->revokePermissionTo($permission);
        }

        Role::where('id', $id)->delete();
        return redirect()->route('role.index')->with('message', 'Role Deleted Successfully');
    }
}
