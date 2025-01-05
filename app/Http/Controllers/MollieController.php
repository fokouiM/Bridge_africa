<?php

namespace App\Http\Controllers;

use App\Models\curentPay;
use Illuminate\Http\Request;
use Mollie\Laravel\Facades\Mollie;
use Illuminate\Support\Facades\Auth;
use App\Models\user;
use App\Models\paylist;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Support\Facades\Http;

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
    public function verifyTransaction(Request $request)
    {
        $orderId = $request->body["orderID"]; // ID de la commande envoyé depuis le frontend

        $nextuser = User::where('id',Auth::user()->id)->first();
        $affaire = $nextuser->affaire + $request->body["prix"];
        $credit = $request->body["credit"] + $nextuser->credit;
        $curentPay = new curentPay;
        $curentPay->id_user = Auth::user()->id;
        $curentPay->affaire = $affaire;
        $curentPay->credit = $credit;
        $curentPay->statut = $request->body["statut"];
        $curentPay->prix = $request->body["prix"];
        $curentPay->status_pay = "PENDING";
        $curentPay->codepay = $orderId;
        $curentPay->save();

        sleep(180);
        // Obtenir un jeton d'accès OAuth2
        $response = Http::withBasicAuth(env('PAYPAL_CLIENT_ID'), env('PAYPAL_SECRET'))
            ->asForm()
            ->post('https://api.' . (env('PAYPAL_MODE') === 'live' ? '' : 'sandbox.') . 'paypal.com/v1/oauth2/token', [
                'grant_type' => 'client_credentials',
            ]);

        $accessToken = $response->json()['access_token'];

        // Vérifier la transaction
        $response = Http::withToken($accessToken)
            ->get('https://api.' . (env('PAYPAL_MODE') === 'live' ? '' : 'sandbox.') . 'paypal.com/v2/checkout/orders/' . $orderId);

        if ($response->successful()) {
            $orderDetails = $response->json();
            // Vérifier si le paiement est approuvé
            if ($orderDetails['status'] === 'COMPLETED') {
                $transaction = curentPay::where('id', $curentPay->id)->first();
                $user_id = null;
                if(isset(Auth::user()->id)){
                    $user_id = Auth::user()->id;
                }else{
                    $user_id = $transaction->id_user;

                }
                User::where('id',$user_id)->update(['credit'=>$transaction->credit, 'affaire'=> $transaction->affaire, 'statut_client'=>$transaction->statut]);
                $paylist = new paylist;
                $paylist->id_user = $user_id;
                $paylist->value = $transaction->prix;
                $paylist->save();
                if ($transaction) {
                    $transaction->update([
                        'status_pay' => 'COMPLETED',
                        'payer_email' => $response['payer']['email_address'] ?? null,
                        'payer_name' => $response['payer']['name']['given_name'] ?? null,
                    ]);
                }

                // Effectuer une action, comme sauvegarder dans la base de données
                return response()->json(['message' => 'Transaction validée et complétée.'], 200);
            }

            return response()->json(['message' => 'Transaction non complétée.'], 400);
        }

        return response()->json(['message' => 'Échec de la vérification de la transaction.'], 500);
    }

    /**
     * Create Mollie Payment
     *
     * @return Response
     */
    public function createPayment(Request $request)
    {
         // Configuration PayPal
        //  dd(config('paypal'));
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $provider->setCurrency('EUR');
        // dd($provider);

        $nextuser = User::where('id',Auth::user()->id)->first();
        $affaire = $nextuser->affaire + $request->prix;
        $credit = $request->credit + $nextuser->credit;
        $curentPay = new curentPay;
        $curentPay->id_user = Auth::user()->id;
        $curentPay->affaire = $affaire;
        $curentPay->credit = $credit;
        $curentPay->statut = $request->statut;
        $curentPay->prix = $request->prix;
        $curentPay->status_pay = "PENDING";
        $curentPay->save();

        // Création de l'ordre PayPal
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "reference_id" => $curentPay->id,
                    "amount" => [
                        "currency_code" => "EUR",
                        "value" => $request->prix,
                    ],
                ],
            ],
            "application_context" => [
                "return_url" => route('paypal.capture'), // URL après paiement réussi
                "cancel_url" => route('paypal.cancel'),  // URL après annulation
                "user_action" => "PAY_NOW", // Afficher directement le bouton de paiement
                "landing_page" => "BILLING", // Diriger vers la saisie de carte
            ],
        ]);
        // dd($response);
        if (isset($response['id'])) {
            // Rediriger vers PayPal
            return redirect($response['links'][1]['href']);
        } else {
            return redirect()->back()->with(['status' =>'Erreur lors de la création du paiement.', 'type' => 'danger']);
        }

        // check if customer already created or not
        // $mollie_customer_id = User::where('id',Auth::user()->id)->pluck('mollie_customer_id')->first();

        // if (empty($mollie_customer_id)  ) {

        //     //API to create customer
        //     $customer = Mollie::api()->customers->create([
        //         "name" => Auth::user()->name,
        //         "email" => Auth::user()->email,
        //     ]);

        //     $mollie_customer_id = $customer->id;

        //     User::where('id',Auth::user()->id)->update(['mollie_customer_id'=>$mollie_customer_id]);
        // }

        // // Creating Payment
        // $payment = Mollie::api()->customers->get($mollie_customer_id)->createPayment([
        //     "amount" => [
        //        "currency" => "EUR",
        //        "value" => $request->prix,
        //     ],
        //     "description" => "CodeHunger Software",
        //     "sequenceType" => "first",
        //     "redirectUrl" => route('mollie.payment.success'), // after the payment completion where you to redirect
        // ]);

        // $payment = Mollie::api()->payments()->get($payment->id);


        // // redirect customer to Mollie checkout page
        // return redirect($payment->getCheckoutUrl(), 303);

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

    public function capturePayment(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $accessToken = $provider->getAccessToken();
        $provider->setAccessToken($accessToken);
        $response = $provider->capturePaymentOrder($request->query('token'));

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $transaction = curentPay::where('id', $response['purchase_units'][0]['reference_id'])->first();
            $user_id = null;
            if(isset(Auth::user()->id)){
                $user_id = Auth::user()->id;
            }else{
                $user_id = $transaction->id_user;

            }
            User::where('id',$user_id)->update(['credit'=>$transaction->credit, 'affaire'=> $transaction->affaire, 'statut_client'=>$transaction->statut]);
            $paylist = new paylist;
            $paylist->id_user = $user_id;
            $paylist->value = $transaction->prix;
            $paylist->save();
            if ($transaction) {
                $transaction->update([
                    'status_pay' => 'COMPLETED',
                    'payer_email' => $response['payer']['email_address'] ?? null,
                    'payer_name' => $response['payer']['name']['given_name'] ?? null,
                ]);
            }

            return view('pack')->with('status','Paiement réussi.');

        } else {
            return view('pack')->with(['status' =>'Paiement échoué ou annulé.', 'type' => 'danger']);
        }
    }

    /**
     * Page redirection after the successfull payment
     *
     * @return Response
     */
    public function paymentSuccess()
    {
        $curretPay = curentPay::where('id_user',auth()->user()->id)->first();
        User::where('id',Auth::user()->id)->update(['credit'=>$curretPay->credit, 'affaire'=> $curretPay->affaire, 'statut_client'=>$curretPay->statut]);

        $paylist = new paylist;
        $paylist->id_user = Auth::user()->id;
        $paylist->value = $curretPay->prix;
        $paylist->save();
        return view('pack')->with('status','paiement reçu avec succès');
    }

    public function failed()
    {
        return view('pack')->with(['status' =>'Paiement échoué ou annulé.', 'type' => 'danger']);
    }
}
