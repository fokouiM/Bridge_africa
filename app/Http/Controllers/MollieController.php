<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mollie\Laravel\Facades\Mollie;
use Illuminate\Support\Facades\Auth;
use App\Models\user;

class MollieController extends Controller
{

    public function  __construct()
    {
        Mollie::api()->setApiKey('live_E43MG8fMqdTG9t9Qw6M8k9dwJEmhkT');
    }

    /**
     * Create Mollie Payment
     *
     * @return Response
     */
    public function createPayment(Request $request)
    {

        // check if customer already created or not
        $mollie_customer_id = User::where('id',Auth::user()->id)->pluck('mollie_customer_id')->first();

        if (empty($mollie_customer_id)  ) {

            //API to create customer
            $customer = Mollie::api()->customers->create([
                "name" => Auth::user()->name,
                "email" => Auth::user()->email,
            ]);

            $mollie_customer_id = $customer->id;

            User::where('id',Auth::user()->id)->update(['mollie_customer_id'=>$mollie_customer_id]);
        }

        // Creating Payment
        // dd($request->prix);
        $payment = Mollie::api()->customers->get($mollie_customer_id)->createPayment([
            "amount" => [
               "currency" => "EUR",
               "value" => $request->prix,
            ],
            "description" => "CodeHunger Software",
            "sequenceType" => "first",
            "redirectUrl" => route('mollie.payment.success'), // after the payment completion where you to redirect
        ]);

        $payment = Mollie::api()->payments()->get($payment->id);

         $nextuser = User::where('id',Auth::user()->id)->first();
         $affaire = $nextuser->affaire + $request->prix;
        if($request->prix == 4.00){

            User::where('id',Auth::user()->id)->update(['credit'=>5, 'affaire'=> $affaire, 'statut_client'=>1]);

        }elseif($request->prix == 12.00){

            User::where('id',Auth::user()->id)->update(['credit'=>17, 'affaire'=> $affaire, 'statut_client'=>1]);

        }elseif($request->prix == 28.00){

            User::where('id',Auth::user()->id)->update(['credit'=>34, 'affaire'=> $affaire, 'statut_client'=>1]);

        }elseif($request->prix == 7.00){

            User::where('id',Auth::user()->id)->update(['credit'=>5, 'affaire'=> $affaire, 'statut_client'=>2]);

        }elseif($request->prix == 21.00){

            User::where('id',Auth::user()->id)->update(['credit'=>18, 'affaire'=> $affaire, 'statut_client'=>2]);

        }elseif($request->prix == 42.00){

            User::where('id',Auth::user()->id)->update(['credit'=>35, 'affaire'=> $affaire, 'statut_client'=>2]);

        }


        // redirect customer to Mollie checkout page
        return redirect($payment->getCheckoutUrl(), 303);

    }

    /**
     * Create Mollie Subscription
     *
     * @return Response
     */
    public function createMollieSubscription()
    {
        $mollie_customer_id = User::where('id',Auth::user()->id)->pluck('mollie_customer_id')->first();

        $customer = Mollie::api()->customers->get($mollie_customer_id);

        $subscription = $customer->createSubscription([
            "description" => "Quarterly payment",
            "interval" => "3 months",
            "amount" => [
                "currency" => "EUR",
                "value" => "25.00",
            ],
            "times" => 12,
        ]);
        dd($subscription);
    }

    /**
     * Page redirection after the successfull payment
     *
     * @return Response
     */
    public function paymentSuccess()
    {
        return view('pack')->with('status','paiement reçu avec succès');
    }
}
