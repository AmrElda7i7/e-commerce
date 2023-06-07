<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $products =Category::join('products','categories.id','products.category_id')
        ->Join('products_images','products.id','products_images.product_id')
        ->select('products.*','categories.name as category_name','products_images.image_name')
        ->get();
        return view('e-commerce.shop',compact('products'));
    }
}
