<?php

namespace App\Http\Controllers\Donation;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use Illuminate\Http\Request;
use Omnipay\Omnipay;

class DonationController extends Controller
{
    public $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('AuthorizeNetApi_Api');
        $this->gateway->setAuthName(env('ANET_API_LOGIN_ID'));
        $this->gateway->setTransactionKey(env('ANET_TRANSACTION_KEY'));
        $this->gateway->setTestMode(true); //comment this line when move to 'live'
    }

    public function charge(Request $request)
    {
        try {
            $creditCard = new \Omnipay\Common\CreditCard([
                'number' => $request->input('cc_number'),
                'expiryMonth' => $request->input('expiry_month'),
                'expiryYear' => $request->input('expiry_year'),
                'cvv' => $request->input('cvv'),
            ]);

            // Generate a unique merchant site transaction ID.
            $transactionId = rand(100000000, 999999999);

            $response = $this->gateway->authorize([
                'amount' => $request->input('amount'),
                'currency' => 'USD',
                'transactionId' => $transactionId,
                'card' => $creditCard,
            ])->send();

            if ($response->isSuccessful()) {

                // Captured from the authorization response.
                $transactionReference = $response->getTransactionReference();

                $response = $this->gateway->capture([
                    'amount' => $request->input('amount'),
                    'currency' => 'USD',
                    'transactionReference' => $transactionReference,
                ])->send();

                $transaction_id = $response->getTransactionReference();
                $amount = $request->input('amount');

                // Insert transaction data into the database
                $isPaymentExist = Donation::where('transaction_id', $transaction_id)->first();

                if (!$isPaymentExist) {
                    $payment = new Donation;
                    $payment->transaction_id = $transaction_id;
                    $payment->card_holder_name = $request->card_holder_name;
                    $payment->amount = $request->input('amount');
                    $payment->currency = 'USD';
                    $payment->payment_status = 'Captured';

                    dd($payment);

                    $payment->save();
                }
                return redirect()->route('app.donation.success', ['transaction_id' => $transaction_id]);
            } else {
                // not successful
                return $response->getMessage();
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
