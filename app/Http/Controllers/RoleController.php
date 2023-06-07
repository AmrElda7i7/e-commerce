<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('permission:create_role')->only(['create','store']);
        $this->middleware('permission:show_roles')->only(['index','show']);
        $this->middleware('permission:update_role')->only(['edit','update']);
        $this->middleware('permission:delete_role')->only(['destroy']);
    }
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.roles', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $permissions = Permission::all();
        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'name' => 'required|max:255|unique:roles,name',
                'permissions' => 'required',
            ]
        );
        
            $role = Role::create($request->only(['name']));
            $role->syncPermissions($request->permissions);
            return redirect()->route('roles.index')->with(['add' => 'role has successfully added']);
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        try {

            $role = Role::findOrFail($id);
            $permissions = Permission::join('role_has_permissions', 'permissions.id', 'role_has_permissions.permission_id')->where('role_id', $id)->get();
            return view('admin.roles.details', compact('role', 'permissions'));
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'there no any role with this id']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        try {

             $role = Role::findOrFail($id);
            $permissions = Permission::all();
            return view('admin.roles.edit', compact('role', 'permissions'));
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'there no any role with this id']);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'name' => 'required|max:255|unique:roles,name,' . $id,
                'permissions' => 'required'
            ]
        );
        try {
            $role = Role::findOrFail($id);
            $role->update($request->only(['name']));
            $role->syncPermissions($request->permissions);
            return redirect()->route('roles.index')->with(['update' => 'role has successfully updated']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'there no any permission with this id']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $role = Role::findOrFail($id);
            $role->delete();
            return redirect()->back()->with(['delete' => 'role has successfully deleted']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'there no any role with this id']);
        }
    }
}