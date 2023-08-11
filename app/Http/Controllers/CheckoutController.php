<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\CheckoutLocation;
use App\Models\Transaction;
use App\Models\Category;
use Auth;
use App\Mail\OrderMail;
use Illuminate\Support\Facades\Mail;


class CheckoutController extends Controller
{

    public function finishtransaction(){

        $cartItems = \Cart::getContent();
        $cartTotal = \Cart::getTotal() + 300;
        $categories = Category::orderBy('id','asc')->take(6)->get();

         return view ('client.finishtransaction',[
             'cartItems' => $cartItems,
             'cartTotal' =>$cartTotal,
             'categories' =>$categories

         ]);
    }

    public function complete_transaction(Request $request){


        return redirect('account');


    }


    public function checkout(){

        $user = Auth::user();

        $locations = CheckoutLocation::all();
        $cartItems = \Cart::getContent();
        $cartTotal = \Cart::getTotal() + 300;
        $categories = Category::orderBy('id','asc')->take(6)->get();

            return view ('client.checkout',[
                'cartItems' => $cartItems,
                'cartTotal' =>$cartTotal,
                'locations'=>$locations,
                'categories' => $categories,
                'user' => $user

            ]);
        }

     public function getAccessToken()
     {
         $url = env('MPESA_ENV') == 0
         ? 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials'
         : 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';



         $curl = curl_init($url);
         curl_setopt_array(
             $curl,
             array(
                 CURLOPT_HTTPHEADER => ['Content-Type: application/json; charset=utf8'],
                 CURLOPT_RETURNTRANSFER => true,
                 CURLOPT_HEADER => false,
                 CURLOPT_USERPWD => env('MPESA_CONSUMER_KEY') . ':' . env('MPESA_CONSUMER_SECRET')
             )
         );
         $response = json_decode(curl_exec($curl));
         curl_close($curl);
         return $response->access_token;
     }

     public function makeHttp($url, $body)
     {

         // $url = 'https://sandbox.safaricom.co.ke/mpesa/' . $url;
          $url = 'https://api.safaricom.co.ke/mpesa/' . $url;
         $curl = curl_init();
         curl_setopt_array(
             $curl,
             array(
                     CURLOPT_URL => $url,
                     CURLOPT_HTTPHEADER => array('Content-Type:application/json','Authorization:Bearer '. $this->getAccessToken()),
                     CURLOPT_RETURNTRANSFER => true,
                     CURLOPT_POST => true,
                     CURLOPT_POSTFIELDS => json_encode($body)
                 )
         );
         $curl_response = curl_exec($curl);
         curl_close($curl);
         return $curl_response;
     }


     public function store_checkout_info(Request $request){

        $cartItems = \Cart::getContent();

        $total_amount = \Cart::getTotal()+300;
            $order = Order::create([
            'user_id' => auth()->user()->id,
            'name' => $request->input('name'),
            'lname' => $request->input('lname'),

            'email' => $request->input('email'),
            'location' => $request->input('location'),
            'contact' => $request->input('mobile'),

            'town' => $request->input('town'),
            'phone' => $request->input('phone'),

            'subtotal' => \Cart::getSubTotal(),
            'total' => $total_amount,
            'transport' => 300,
            ]);

            $timestamp = date('YmdHis');
            $password = base64_encode(env('MPESA_STK_SHORTCODE').env('MPESA_PASSKEY').$timestamp);

           $curl_post_data = array(
               'BusinessShortCode' =>7953048,
               'Password' => $password,
               'Timestamp' => $timestamp,
               'TransactionType' => 'CustomerBuyGoodsOnline',

               //CustomerBuyGoodsOnline CustomerPayBillOnline  CustomerBuyGoodsOnline
               'Amount' => 1,
               //$request->amount,
               'PartyA' => $request->input('mobile'),
       
            'PartyB' => env('MPESA_TILL_NO'),
               'PhoneNumber' => $request->input('mobile'),
               'CallBackURL' => env('MPESA_TEST_URL'). '/api/stkpush',
               'AccountReference' => 'Sydtec soln',
               'TransactionDesc' => 'Mictech Soln'
             );

           $url = '/stkpush/v1/processrequest';
           $response = $this->makeHttp($url, $curl_post_data);
           $y = json_decode($response, true);

           try{

           $transaction = new Transaction();
           $transaction->MerchantRequestID = $y["MerchantRequestID"];
           $transaction->CheckoutRequestID = $y["CheckoutRequestID"];
           $transaction->ResponseCode = $y["ResponseCode"];
           $transaction->ResponseDescription = $y["ResponseDescription"];
           $transaction->MerchantRequestID = $y["MerchantRequestID"];
           $transaction->name = $request->input('name');
           $transaction->order_id =  $order->id;

           $transaction->save();

           $items = \Cart::getContent();

           foreach ($items as $item){

               $order_item = new OrderItem();
               $order_item->product_id = $item->id;
               $order_item->name = $item->name;
               $order_item->price = $item->price;
               $order_item->quantity = $item->quantity;
               $order_item->order_id = $order->id;
               $order_item->image = $item->attributes->image;
               $order_item->size = $item->attributes->product_size;

               $order_item->color = $item->attributes->product_color;

               $order_item->save();
           }

           $data = [
            'name' =>  $request->input('name'),
            
            'phone' => $request->input('phone'),
            'total' => $total_amount,
            'transport' => 300,
            'subtotal' => \Cart::getSubTotal(),
            'location' => $request->input('location'),
            'contact' => $request->input('mobile'),


            
           ];

               Mail::to($request->input('email'))->send(new OrderMail($data));


           Cart::clear();

        } catch (\Exception $e) {
            //    return $e->getMessage();

            return redirect('/shop');


            // dd('error');
            //   return $e->getMessage();
          }
            return redirect()->route('complete_transaction');

     }
    }





