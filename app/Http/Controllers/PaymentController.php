<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\ShoppingCart;
use App\Models\User;
use App\Traits\PaymentTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    use PaymentTrait ;
    public function credit()
    {
        $token = $this->getToken();
        $order = $this->createOrder($token);
        $paymentToken = $this->getPaymentToken($order->id, $token);
        return \Redirect::away('https://accept.paymob.com/api/acceptance/iframes/754309?payment_token=' . $paymentToken);
    }
    public function callback(Request $request)
    {
        $data = $request->all();
        ksort($data);
        $hmac = $data['hmac'];
        $arr = [
            'amount_cents',
            'created_at',
            'currency',
            'error_occured',
            'has_parent_transaction',
            'id',
            'integration_id',
            'is_3d_secure',
            'is_auth',
            'is_capture',
            'is_refunded',
            'is_standalone_payment',
            'is_voided',
            'order',
            'owner',
            'pending',
            'source_data_pan',
            'source_data_sub_type',
            'source_data_type',
            'success'

        ];


        $concatenatedString = '';
        foreach ($data as $key => $value) {
            if (in_array($key, $arr)) {
                $concatenatedString .= $value;
            }
        }

        $secret = 'ADFA83155BDEECB9BDDC65FA2DFEE8EF';
        $hashed = hash_hmac('SHA512', $concatenatedString, $secret);
        if ($hashed == $hmac) {
            // do not forget shipping company
            $order= Order::create([
                'order_name'=>Str::random(6) ,
                'user_id'=>auth()->user()->id,
                'total_price'=>$request->amount_cents,
                'payment_status'=>'paid' ,
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
        } else {
           abort(404) ;
        }
    }


}