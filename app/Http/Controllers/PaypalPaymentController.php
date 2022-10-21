<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Srmklive\PayPal\Facades\PayPal;
use Srmklive\PayPal\Traits\PayPalAPI;

class PaypalPaymentController extends Controller
{

    public $provider;

    public function __construct()
    {
        $this->provider = PayPal::setProvider();
    }

    public function create(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $this->provider->setApiCredentials(config('paypal'));
        $token = $this->provider->getAccessToken();
        $this->provider->setAccessToken($token);
        $order = $this->provider->createOrder([
            "intent"=> "CAPTURE",
            "purchase_units"=> [
                [
                    "amount"=> [
                        "currency_code"=> "USD",
                        "value"=> $data['amount']
                    ],
                    'description' => 'test'
                ]
            ],
            'application_context' => [
                'cancel_url' => 'https://google.com',
                'return_url' => 'https://facebook.com'
            ]
        ]);
//        $mergeData = array_merge($data,['status' => "PENDING", 'vendor_order_id' => $order['id']]);
        DB::beginTransaction();
        Transactions::create([
            'tracking_code' => $order['id'],
//            'tracking_code' => Str::uuid(),
            'user_id' => Auth::user()->id ?? 1,
            'product_id' => $data['product_id'],
            'status' => "PENDING"
        ]);
        DB::commit();
        return response()->json($order);

        //return redirect($order['links'][1]['href'])->send();
        // echo('Create working');
    }

    public function capture(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $orderId = $data['orderId'];
        $this->provider->setApiCredentials(config('paypal'));
        $token = $this->provider->getAccessToken();
        $this->provider->setAccessToken($token);
        $result = $this->provider->capturePaymentOrder($orderId);

//            $result = $result->purchase_units[0]->payments->captures[0];
        try {
            DB::beginTransaction();
            if($result['status'] === "COMPLETED"){
                $order = Transactions::where('tracking_code', $orderId)->first();
//                $transaction = new Transaction;
//                $transaction->vendor_payment_id = $orderId;
//                $transaction->payment_gateway_id  = $data['payment_gateway_id'];
//                $transaction->user_id   = $data['user_id'];
//                $transaction->status   = "COMPLETED";
//                $transaction->save();
//                $order = Order::where('vendor_order_id', $orderId)->first();
//                $order->transaction_id = $transaction->id;
                $order->status = "COMPLETED";
                $order->save();
                DB::commit();
            }
        } catch (Exception $e) {
            DB::rollBack();
            dd($e);
        }
        return response()->json($result);
    }
}
