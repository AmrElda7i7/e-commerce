<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePermissionRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('permission:create_permission')->only(['create','store']);
        $this->middleware('permission:show_permissions')->only(['index','show']);
        $this->middleware('permission:update_permission')->only(['edit','update']);
        $this->middleware('permission:delete_permission')->only(['destroy']);
    }
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissions', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|max:255|unique:permissions,name',

            ]
        );
        //
        Permission::create($request->only(['name']));
        return redirect()->back()->with(['add' => 'permission has successfully created']);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'name' => 'required|max:255|unique:permissions,name,' . $id
            ]
        );

        try {
            $permission = Permission::findOrFail($id);
            $permission->update($request->only(['name']));
            return redirect()->back()->with(['update' => 'permission has successfully updated']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'there no any permission with this id']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $permission = Permission::findOrFail($id);
            $permission->delete();
            return redirect()->back()->with(['delete' => 'permission has successfully deleted']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'there no any permission with this id']);
        }
    }

}