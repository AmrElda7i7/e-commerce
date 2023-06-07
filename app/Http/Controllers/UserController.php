<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('permission:create_user')->only(['create','store']);
        $this->middleware('permission:show_users')->only(['index','show']);
        $this->middleware('permission:update_user')->only(['edit','update']);
        $this->middleware('permission:delete_user')->only(['destroy']);
    }
    public function index()
    {
        $users = User::join('model_has_roles', 'users.id', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->select('users.*', 'roles.name as role_name')
            ->get();
        return view('admin.users.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8'],
            ]
        );

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        try {

            $user->assignRole($request->role);
            return redirect()->route('users.index')->with(['add' => 'user has successfully created']);
        } catch (\Exception $e) {
            return redirect()->route('users.index')->with(['error' => 'unknown role id']);
        }
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
        try {

            $user = User::findOrFail($id);
            $roles = Role::all();


            return view('admin.users.edit', compact('user', 'roles'));
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'there no any user with this id']);
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
                'password' => ['required', 'string', 'min:8'],
            ]
        );
        try {
            $user = User::findOrFail($id);
            $user->update($request->only(['name','email','password']));
            $user->assignRole($request->role);

            return redirect()->route('users.index')->with(['update' => 'user has successfully updated']);
        } catch (\Exception $e) {
            return redirect()->route('users.index')->with(['error' => 'unknown user id']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return redirect()->back()->with(['delete' => 'user has successfully deleted']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'there no any user with this id']);
        }
    }
}