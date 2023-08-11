<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use DB;

use function PHPUnit\Framework\returnSelf;
use function Spatie\Ignition\Config\toArray;

class TransactionController extends Controller
{

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
        // $url = 'https://mpesa-reflector.herokuapp.com' . $url;
        $url = 'https://sandbox.safaricom.co.ke/mpesa/' . $url;

        // $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';

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

    public function stkpushForm(){

        return view ('transaction.stk');
    }


    public function stkPush(Request $request)
    {
         $timestamp = date('YmdHis');
         $password = base64_encode(env('MPESA_STK_SHORTCODE').env('MPESA_PASSKEY').$timestamp);

        $curl_post_data = array(
            'BusinessShortCode' => env('MPESA_STK_SHORTCODE'),
            'Password' => $password,
            'Timestamp' => $timestamp,
            'TransactionType' => 'CustomerPayBillOnline',
            //CustomerBuyGoodsOnline
            'Amount' => 1,
            //$request->amount,
            'PartyA' => $request->contact,
            'PartyB' => env('MPESA_STK_SHORTCODE'),
            'PhoneNumber' => $request->contact,
            'CallBackURL' => env('MPESA_TEST_URL'). '/api/stkpush',
            'AccountReference' => 'account',
            'TransactionDesc' => 'account'
          );

        $url = '/stkpush/v1/processrequest';
        $response = $this->makeHttp($url, $curl_post_data);

        $y = json_decode($response, true);

        try {

            $transaction = new Transaction();
            $transaction->MerchantRequestID = $y["MerchantRequestID"];
            $transaction->CheckoutRequestID = $y["CheckoutRequestID"];
            $transaction->ResponseCode = $y["ResponseCode"];
            $transaction->ResponseDescription = $y["ResponseDescription"];
            $transaction->MerchantRequestID = $y["MerchantRequestID"];
            $transaction->name = $request->input('name');
            $transaction->order_id = '1';


            // dd($transaction);

            $transaction->save();

            return redirect()->route('stk_query', ['id' => $y["CheckoutRequestID"]]);

          } catch (\Exception $e) {

            // dd('error');
              return $e->getMessage();
          }






        // return redirect()->route('stk_query');

        // dd($y["ResponseCode"]);
        return $y;
    }



    public function transactionQuery($id){

        $timestamp = date('YmdHis');
        $password = base64_encode(env('MPESA_STK_SHORTCODE').env('MPESA_PASSKEY').$timestamp);
        $curl_post_data = array(
            'BusinessShortCode' => env('MPESA_STK_SHORTCODE'),
            'Password' => $password,
            'Timestamp' => $timestamp,
            'CheckoutRequestID' =>$id
        );
        $url = '/stkpushquery/v1/query';
        $response = $this->makeHttp($url, $curl_post_data);
        $y = json_decode($response, true);

        sleep(10);



        if($y["ResponseCode"] =="0")
        {
            if($y["ResultCode"] == "0" ){
                return view('transaction.check',[
                    'trans_id' => $id,
                    'ResultCode'=>$y["ResultCode"],
                    'ResultDesc'=>$y["ResultDesc"]
                ]
                );
            }
            elseif($y["ResultCode"] == "1037" ){

                return view('transaction.check',[
                    'trans_id' => $id,

                    'ResultCode'=>$y["ResultCode"],
                    'ResultDesc'=>$y["ResultDesc"]
                ]
                );


            }
            else{
                return redirect('/');

            }  }
        else{
            dd('eerrrorr');
        }
        return view('transaction.check',[
            'y'=>$y
        ]
    );
}

    public function savequerydata(Request $request){

        DB::table('transactions')
        ->where('CheckoutRequestID', $request->input('trans_id'))

        ->update([
            'ResultCode' => $request->input('ResultCode'),
            'ResultDesc'=> $request->input('ResultDesc'),
            ]);


    }


        // return $response;









}
