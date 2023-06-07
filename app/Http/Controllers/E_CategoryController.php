<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class E_CategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        $products =Category::join('products','categories.id','products.category_id')
        ->Join('products_images','products.id','products_images.product_id')
        ->where('products.category_id',$id)
        ->select('products.*','categories.name as category_name','products_images.image_name')
        ->get();
        return view('e-commerce.category',compact('products'));
    }
}
