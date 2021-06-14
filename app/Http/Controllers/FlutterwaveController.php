<?php

namespace App\Http\Controllers;

use KingFlamez\Rave\Facades\Rave as Flutterwave;
use App\Models\Donation;
use Illuminate\Support\Str;

class FlutterwaveController extends Controller
{
    /**
     * Initialize Rave payment process
     * @return void
     */
    public function initialize()
    {
        //This generates a payment reference
        $reference = Flutterwave::generateReference();
        $reference = 'EV' . date('Y') . Str::random(10);

        // Enter the details of the payment
        $data = [
            'payment_options' => 'card,banktransfer',
            'amount' => request()->amount,
            'email' => request()->email,
            'tx_ref' => $reference,
            'currency' => "NGN",
            'redirect_url' => route('callback'),
            'customer' => [
                'email' => request()->email,
                "phone_number" => request()->phone,
                "name" => request()->name
            ],

            "customizations" => [
                "title" => request()->title,
                "description" => request()->description
            ]
        ];

        $payment = Flutterwave::initializePayment($data);


        if ($payment['status'] !== 'success') {
            // notify something went wrong
            return;
        }

        return redirect($payment['data']['link']);
    }

    /**
     * Obtain Rave callback information
     * @return void
     */
    public function callback()
    {

        $status = request()->status;

        //if payment is successful
        if ($status ===  'successful') {

        $transactionID = Flutterwave::getTransactionIDFromCallback();
        $data = Flutterwave::verifyTransaction($transactionID);

         // Check if email exist in database
         $newDonation = Donation::where('transaction_ref', $data['data']['tx_ref'])->first();
         if ($newDonation === null) {
            Donation::create([
                'name' => $data['data']['customer']['name'],
                'amount_donated' => $data['data']['amount'],
                'amount_settled' => $data['data']['amount_settled'],
                'processor_fee' => $data['data']['app_fee'],
                'email' => $data['data']['customer']['email'],
                'phone_number' => $data['data']['customer']['phone_number'],
                'status' => $data['data']['status'],
                'date' => $data['data']['created_at'],
                'transaction_ref' => $data['data']['tx_ref'],
                'country' => $data['data']['card']['country'],
            ]);
         }

         return redirect()->route('success')->with('data', $data);
        //return view('frontend.success', compact('data'));

        //dd($data);
        }
        elseif ($status ===  'cancelled'){

            return redirect()->route('failed');
            //Put desired action/code after transaction has been cancelled here
        }
        else{

            return redirect()->route('failed');
            //Put desired action/code after transaction has failed here
        }
        // Get the transaction from your DB using the transaction reference (txref)
        // Check if you have previously given value for the transaction. If you have, redirect to your successpage else, continue
        // Confirm that the currency on your db transaction is equal to the returned currency
        // Confirm that the db transaction amount is equal to the returned amount
        // Update the db transaction record (including parameters that didn't exist before the transaction is completed. for audit purpose)
        // Give value for the transaction
        // Update the transaction to note that you have given value for the transaction
        // You can also redirect to your success page from here

    }

    public function failed()
    {

    }
}
