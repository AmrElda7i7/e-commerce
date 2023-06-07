<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('permission:create_product')->only(['create', 'store']);
        $this->middleware('permission:show_products')->only(['index', 'show']);
        $this->middleware('permission:update_product')->only(['edit', 'update']);
        $this->middleware('permission:delete_product')->only(['destroy']);
    }
    public function index()
    {
        $products = Category::join('products', 'categories.id', 'products.category_id')
            ->select('products.*', 'categories.name as category_name')
            ->get();
        return view('admin.products.products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'name' => 'required|max:255',
                'category' => 'required',
                'description' => 'required',
                'price' => 'numeric|required',
                'product_image' => 'required|mimes:jpeg,png,jpg|max:10240'

            ]
        );
        try {

            $product = Product::create(
                [
                    'name' => $request->name,
                    'price' => $request->price,
                    'category_id' => $request->category,
                    'description' => $request->description
                ]
            );

            $image_name = $request->file('product_image')->getClientOriginalName();
            $request->file('product_image')->storeAs(str_replace(" ","_",$product->name), $image_name, 'uploads');
            DB::table('products_images')->insert(
                [
                    'image_name' => $image_name,
                    'product_id' => $product->id
                ]
            );
            return redirect()->route('products.index')->with(['add' => 'product has successfully added']);
        } catch (\Exception $e) {
            return redirect()->route('products.index')->with(['error' => 'there no any category with this id']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {

            $image = DB::table('products_images')->findOr($id, function () {
                throw new \Exception();
            });
            $product = Product::findOrFail($image->product_id);
            $path = public_path('uploads/' . str_replace(" ","_",$product->name) . '/' . $image->image_name);
            return response()->file($path);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'there no any image with this id']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $product = Category::join('products', 'categories.id', 'products.category_id')
                ->select('products.*', 'categories.name as category_name')
                ->where('products.id', $id)
                ->firstORFail();
            $categories = Category::all();

            $product_image = DB::table('products_images')->where('product_id', $id)->first();
            return view('admin.products.edit', compact('product', 'categories', 'product_image'));

        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'there no any product with this id']);
        }




    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate(
            [
                'name' => 'required|max:255',
                'category' => 'required',
                'description' => 'required',
                'price' => 'numeric|required',
                'product_image' => 'mimes:jpeg,png,jpg|max:10240'

            ]
        );


try{

    $product = Product::findOrFail($id);
    $image = DB::table('products_images')->where('product_id', $id)->first();
    $oldPath = public_path('uploads' . '/' . $product->name);
    $newPath = public_path('uploads' . '/' . $request->name);
    rename($oldPath, $newPath);
    if ($request->hasFile('product_image')) {
        Storage::disk('uploads')->delete($request->name . '/' . $image->image_name);
        $request->file('product_image')->storeAs($request->name, $request->file('product_image')->getClientOriginalName(), 'uploads');
        DB::table('products_images')->where('product_id', $id)->update(
            [
                    'image_name' => $request->file('product_image')->getClientOriginalName()
                    ]
                );
            }
        $product->update(
            [
                'name' => $request->name,
                'price' => $request->price,
                'category_id' => $request->category,
                'description' => $request->description
                ]
            );
            return redirect()->route('products.index')->with(['update' => 'product has successfully updated']);
        }catch(\Exception $e)
        {
            return redirect()->back()->with(['error' => 'there no any product with this id']);
        }

            
            
            

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        try {
            $product = Product::findOrFail($id);
            $product_image = DB::table('products_images')->where('product_id', $id)->first();
            $path = str_replace(" ","_",$product->name);
            Storage::disk('uploads')->deleteDirectory($path);
            $product->delete();
            return redirect()->back()->with(['delete' => 'product has successfully deleted']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'there no any product with this id']);
        }
    }
    public function search(Request $request)
    {
        $products=Product::join('products_images','products.id','products_images.product_id')
        ->where('products.name','like',"%$request->search%")->get();
        return view('e-commerce.search')->withDetails($products);
    }
}