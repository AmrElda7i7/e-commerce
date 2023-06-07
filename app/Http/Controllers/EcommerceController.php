<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class EcommerceController extends Controller
{
    //  
    public function home()
    {
        $products= Product::join('products_images','products.id','products_images.product_id')->inRandomOrder()->limit(5)
        ->select('products.*','products_images.image_name')
        ->get();
        return view('e-commerce.home',compact('products'));
     
    }
}
