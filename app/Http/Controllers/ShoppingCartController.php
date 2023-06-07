<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
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
        return view('e-commerce.cart', compact('orders', 'totalPrice'));
        // return $orders;
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
        try {
            $product = Product::findOrFail($request->product_id);
            ShoppingCart::create(
                [
                    'user_id' => auth()->user()->id,
                    'product_id' => $product->id
                ]
            );

        } catch (\Exception $e) {
            abort(404, 'product not found');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(ShoppingCart $shoppingCart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        //
        try {
            $product = ShoppingCart::findOrFail($id);
            $product->delete();
            return redirect()->back();
        } catch (\Exception $e) {
            abort(404, 'product not found');
        }
    }
    public function modifyQuantity($id, Request $request)
    {
        try {
            $product = ShoppingCart::findOrFail($id);
            $quantity = $request->quantity;
            $product->update(
                [
                    'quantity' => $quantity
                ]
            );

            return redirect()->back();
        } catch (\Exception $e) {
            abort(404);
        }

    }

}