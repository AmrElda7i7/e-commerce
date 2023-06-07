<?php
namespace App\Traits ;
use App\Models\Product;
use Illuminate\Support\Facades\Http;

trait PaymentTrait{

    public function getToken()
    {

        $response = Http::
            withOptions(['verify' => 'C:\xampp\apache\bin\curl-ca-bundle.crt'])->post('https://accept.paymob.com/api/auth/tokens', [
                'api_key' => 'ZXlKaGJHY2lPaUpJVXpVeE1pSXNJblI1Y0NJNklrcFhWQ0o5LmV5SmpiR0Z6Y3lJNklrMWxjbU5vWVc1MElpd2ljSEp2Wm1sc1pWOXdheUk2TnpVeE1EZzFMQ0p1WVcxbElqb2lhVzVwZEdsaGJDSjkuSkg2WXFvbWhzYl9scC1DeUZjQUZXYWFqaDlHQlg0eVQtNXlYVnNEOVF2UWRUSmxkZGRoUE1uNGxqcEozZTFlWTktZXlVakFib3BYWW5CY2Z5dF9zLWc='
            ]);
        return $response->object()->token;
    }
    private function getOrderData()
    {
        $data=[];
        $orders = Product::join('shopping_carts', 'products.id', 'shopping_carts.product_id')
          
            ->where('shopping_carts.user_id', auth()->user()->id)
            ->select('products.*', 'shopping_carts.id as order_id', 'shopping_carts.quantity')
            ->get();
            $totalPrice = 0;
            foreach ($orders as $order) {
    
                $totalPrice += $order->price * $order->quantity;
            }
            $data['orders']= $orders ;
            $data['total_price']=$totalPrice ;
            return $data ;

    }
    public function createOrder($token)
    {
        $items =[];
        $orders = $this->getOrderData()['orders'];
        $totalPrice = $this->getOrderData()['total_price'];
        $i=0 ;
        foreach ($orders as $order) {
           $items[$i]['name']= $order->name ;
           $items[$i]['amount_cents']= $order->price*100 ;
           $items[$i]['description']= $order->description ;
           $items[$i]['quantity']= $order->quantity ;
            $i++ ;
        }
       
        $data = [
            "auth_token" => $token,
            "delivery_needed" => "false",
            "amount_cents" =>  $totalPrice*100,
            "currency" => "EGP",
            "merchant_order_id" => rand(1, 10000),
            "items" => $items
        ];
        $response = Http::withOptions(['verify' => 'C:\xampp\apache\bin\curl-ca-bundle.crt'])->post('https://accept.paymob.com/api/ecommerce/orders', $data);
        return $response->object();
    }
    public function getPaymentToken($order, $token)
    {
        $totalPrice = $this->getOrderData()['total_price'];
        $data =
            [
                "auth_token" => $token,
                "amount_cents" => $totalPrice*100,
                "expiration" => 3600,
                "order_id" => $order,
                "billing_data" => [
                    "apartment" => "803",
                    "email" => "claudette09@exa.com",
                    "floor" => "42",
                    "first_name" => "Clifford",
                    "street" => "Ethan Land",
                    "building" => "8028",
                    "phone_number" => "+86(8)9135210487",
                    "shipping_method" => "PKG",
                    "postal_code" => "01898",
                    "city" => "Jaskolskiburgh",
                    "country" => "CR",
                    "last_name" => "Nicolas",
                    "state" => "Utah"
                ],
                "currency" => "EGP",
                "integration_id" => 3743299,
                "lock_order_when_paid" => "false"
            ];
        $response = Http::withOptions(['verify' => 'C:\xampp\apache\bin\curl-ca-bundle.crt'])->post('https://accept.paymob.com/api/acceptance/payment_keys', $data);
        return $response->object()->token;
    }
}