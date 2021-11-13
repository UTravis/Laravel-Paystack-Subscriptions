<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    public function makePlan(Request $request)
    {

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/plan",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => [
                "name"=> "Monthly Subscription Payment",
                "interval"=> "monthly",
                "amount"=> 100000
            ],
        CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer sk_test_c5bf0023b14b1a1ca0b56678c05534b14a311740",
            "Cache-Control: no-cache"
        ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            //echo $response;
            $response_data = json_decode($response);
            $plan_code = $response_data->data->plan_code;

            //Making subscription / initialize payment code
            $url = "https://api.paystack.co/transaction/initialize";
            $fields = [
                'email' => $request->email,
                'amount' => "100000",
                'plan' => $plan_code
            ];
            $fields_string = http_build_query($fields);
            //open connection
            $ch = curl_init();
  
            //set the url, number of POST vars, POST data
            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch,CURLOPT_POST, true);
            curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "Authorization: Bearer sk_test_c5bf0023b14b1a1ca0b56678c05534b14a311740",
                "Cache-Control: no-cache",
            ));
  
            //So that curl_exec returns the contents of the cURL; rather than echoing it
            curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
  
            //execute post
            $result = curl_exec($ch);
            //echo $result;
            $ini_data = json_decode($result);
            $auth_url = $ini_data->data->authorization_url;

            if($result)
            {
                return redirect($auth_url);
            }
        }

    }
}
