<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $permissions = Permission::all();
        return view('dashboard.permission.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.permission.create');
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

        $permission = Permission::create(['name'=> $request->input('name'), 'guard_name' => 'web']);
        return redirect()->route('permission.index')->with('message', 'Permission Created Successfully');
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
    public function edit($id)
    {
        //
        $permission = Permission::find($id);
        return view('dashboard.permission.edit', compact('permission'));
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

        $permission = Permission::where('id', $id)->update(['name'=> $request->input('name'), 'guard_name' => 'web']);
        return redirect()->route('permission.index')->with('message', 'Permission Updated Successfully');
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

        $permission = Permission::find($id);

        $roles= Role::all()->pluck('name');

        foreach($roles as $role)
        {
            $permission->removeRole($role);
        }
        Permission::where('id', $id)->delete();
        return redirect()->route('permission.index')->with('message', 'Permission Deleted Successfully');
    }

    public function rolePermissions(Request $request)
    {
        $permissions = Permission::all();
        $roles = Role::all();
        return view('dashboard.permission.role-permission', compact('roles', 'permissions'));
    }


    public function syncPermissions(Request $request)
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $roles = Role::all();
        foreach($roles as $role)
        {
            $permissions = $request->input('permissions' . $role->name, []);
            $role->syncPermissions($permissions);
        }

        return redirect()->route('permission.index')->with('message', 'Permission Sync Successfully');
    }
}
