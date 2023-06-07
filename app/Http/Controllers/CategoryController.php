<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('permission:create_category')->only(['create','store']);
        $this->middleware('permission:show_categories')->only(['index','show']);
        $this->middleware('permission:update_category')->only(['edit','update']);
        $this->middleware('permission:delete_category')->only(['destroy']);
    }
    public function index()
    {
        $categories= Category::all();
        return view('admin.categories',compact('categories'));
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
        //
        $request->validate(
            [
                'name' => 'required|max:255|unique:permissions,name',

            ]
        );
        //
        Category::create($request->only(['name']));
        return redirect()->back()->with(['add' => 'category has successfully created']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate(
            [
                'name' => 'required|max:255|unique:permissions,name,' . $id
            ]
        );

        try {
            $permission = Category::findOrFail($id);
            $permission->update($request->only(['name']));
            return redirect()->back()->with(['update' => 'category has successfully updated']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'there no any category with this id']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        try {
            $permission = Category::findOrFail($id);
            $permission->delete();
            return redirect()->back()->with(['delete' => 'category has successfully deleted']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'there no any category with this id']);
        }
    }
}
