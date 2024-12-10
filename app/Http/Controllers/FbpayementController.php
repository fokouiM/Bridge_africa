<?php

namespace App\Http\Controllers;

use App\Models\curentPay;
use Illuminate\Http\Request;
use Mollie\Laravel\Facades\Mollie;
use Illuminate\Support\Facades\Auth;
use App\Models\user;
use Illuminate\Support\Facades\Hash;
use App\Models\paylist;

class FbpayementController extends Controller
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
    public function createPayment($prix,Request $request)
    {

        if($prix < "1"){
            return view('packFacebook')->with('status','somme demandé pour le payement est invalide');
        }
        // check if customer already created or not
        $mollie_customer_id = User::where('id',"1998")->pluck('mollie_customer_id')->first();

        if (empty($mollie_customer_id)  ) {

            //API to create customer
            $customer = Mollie::api()->customers->create([
                "name" => "facebookpay",
                "email" => "support@unevoyante-fr.fr",
            ]);

            $mollie_customer_id = $customer->id;

            User::where('id',"1998")->update(['mollie_customer_id'=>$mollie_customer_id]);
        }

        // Creating Payment
        $payment = Mollie::api()->customers->get($mollie_customer_id)->createPayment([
            "amount" => [
               "currency" => "EUR",
               "value" => $prix,
            ],
            "description" => "CodeHunger Software",
            "sequenceType" => "first",
            "redirectUrl" => route('facebook.mollie.payment.success'), // after the payment completion where you to redirect
        ]);

        $payment = Mollie::api()->payments()->get($payment->id);

         $nextuser = User::where('id',Auth::user()->id)->first();
         $affaire = $nextuser->affaire + $request->prix;
         $credit = $request->credit + $nextuser->credit;
         $codepay = Hash::make(date("Y-m-d H:i:s"));
            $curentPay = new curentPay;
            $curentPay->id_user = "live_E43MG8fMqdTG9t9Qw6M8k9dwJEmhkT";
            $curentPay->affaire = $affaire;
            $curentPay->credit = $credit;
            $curentPay->statut = $request->statut;
            $curentPay->prix = $request->prix;
            $curentPay->codepay = $codepay;
            $curentPay->save();

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
        $curretPay = curentPay::where('id_user',"live_E43MG8fMqdTG9t9Qw6M8k9dwJEmhkT")->first();

        $paylist = new paylist;
        $paylist->id_user = Auth::user()->id;
        $paylist->value = $curretPay->prix;
        $paylist->codepay = $curretPay->codepay;
        $paylist->save();
        return view('packFacebook')->with('status','paiement reçu avec succès votre code de validation de payement est le : '.$curretPay->codepay);
    }
}
