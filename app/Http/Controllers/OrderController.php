<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $orders = Product::join('shopping_carts', 'products.id', 'shopping_carts.product_id')
            ->join('products_images', 'products.id', 'products_images.product_id')
            ->where('shopping_carts.user_id', auth()->user()->id)
            ->select('products.*', 'shopping_carts.id as order_id', 'shopping_carts.quantity', 'products_images.*')
            ->get();
        $totalPrice = 0;
        foreach ($orders as $order) {

            $totalPrice += $order->price * $order->quantity;
        }
        return view('e-commerce.checkout', compact('orders', 'totalPrice'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'first_name' => 'required|string|max:30',
                'last_name' => 'required|string|max:30',
                'country' => 'required|string|max:30',
                'address' => 'required|string',
                'city' => 'required|string|max:30',
                'postcode' => 'required|numeric',
                'phone' => 'required|numeric',
                'email' => 'email|required'

            ]
        );
        if ($request->payment_method == 'visa') {
            return redirect()->route('credit');

        } elseif ($request->payment_method == 'on_delivery') {
            /*
            save order and set payment status to unpaid
            send data to shipping company
            */ 
            // i should make a pattern for order name but anyway it does not matter
           $order= Order::create([
                'order_name'=>Str::random(6) ,
                'user_id'=>auth()->user()->id,
                'total_price'=>$request->total,
                'payment_status'=>'unpaid' ,
                'shipping_status'=>'not delivered'

            ]);
            $products = ShoppingCart::where('user_id',auth()->user()->id)->get(); 
            foreach($products as $product)
            {
                DB::table('orders_products')->insert(
                    [
                        'order_id'=>$order->id,
                        'product_id'=>$product->product_id
                    ]
                );
            }
            ShoppingCart::where('user_id',auth()->user()->id)->delete() ;
            return redirect()->to('/');
       
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}