<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payment/payment');
    }

    
    
    public function store(Request $request)
    {
        
        // dd(env('RAZORPAY_KEY'), env('APP_NAME'));

        // dd([
        //     'env_loaded' => file_exists(base_path('.env')),
        //     'app_name' => env('APP_NAME'),
        //     'razorpay_key' => env('RAZORPAY_KEY'),
        // ]);

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'amount' => 'required|numeric|min:1',
        ]);
        // dd(env('APP_NAME'));

        // dd(env('RAZORPAY_KEY'));

// dd(config('services.razorpay.key'));
        $api = new Api('rzp_test_mwcnGlChzQ0WSw', 'ToubjbiwhTELHEdk6ANv8f4V');

        try {

            $order = $api->order->create([
                'receipt'         => 'order_rcptid_11',
                'amount'          => $request->amount * 100,
                'currency'        => 'INR',
                'payment_capture' => 1,
            ]);
           

            $payment = Payment::create([
                'user_id'        => 3, 
                'payment_method' => 'Razorpay', 
                'status'         => 'Pending',
                'amount'         => $request->amount,
                'currency'       => 'INR',
                'transaction_id' => $order['id'],
                'payment_mode'   => null, 
            ]);

            return view('payment/checkout', [
                'order' => $order,
                'name' => $request->name,
                'email' => $request->email,
                'payment' => $payment,
            ]);
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }

    public function callback(Request $request)
    {
    $signature = $request->header('X-Razorpay-Signature');
    $payload = $request->getContent();
    try {
        $api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));
        $api->utility->verifyWebhookSignature($payload, $signature, config('services.razorpay.webhook_secret'));

        $paymentId = $request->input('payload.payment.entity.id');
        $status = $request->input('payload.payment.entity.status');

        $payment = Payment::where('transaction_id', $paymentId)->first();
        if ($payment) {
            $payment->update([
                'status' => $status === 'captured' ? 'Success' : 'Failed',
                'payment_mode' => $request->input('payload.payment.entity.method'), 
            ]);
        }
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 400);
    }

    return response()->json(['status' => 'success']);
}

    }
