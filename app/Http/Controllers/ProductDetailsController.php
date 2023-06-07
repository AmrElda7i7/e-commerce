<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ProductDetailsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        $product =Category::join('products','categories.id','products.category_id')
        ->Join('products_images','products.id','products_images.product_id')
        ->where('products.id',$id)
        ->select('products.*','categories.name as category_name','categories.id as category_id','products_images.image_name')
        ->first();
        return view('e-commerce.product',compact('product'));
    }
}
