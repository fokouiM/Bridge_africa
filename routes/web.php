<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\message;
use App\Models\blog;
use App\Events\NewMessage;
use PhpParser\Node\Stmt\Return_;
use App\Http\Controllers\MollieController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {

    if(isset(Auth::user()->id)){
        if(Auth::user()->statut == 1){
            $message = message::where('statut',1)->get();
            return view('voyants.Home')->with('message', $message);

        }elseif(Auth::user()->statut == 0){
            return view('welcome');

        }elseif(Auth::user()->statut == 2){

            $dateM = carbon::today()->subDays(30);
            $dateS = carbon::today()->subDays(7);
            $client = User::where('statut',0)->get();
            $clientM = User::where('statut',0)->where('updated_at','>',$dateM)->get();
            $clientS = User::where('statut',0)->where('updated_at','>',$dateS)->get();
            $agent = User::where('statut',1)->get();
            $venteM = 0;
            $venteS = 0;
            $vente = 0;
            $clientT = 0;
            $credit = 0;
            $agentT = 0;
            foreach($client as $cl){

                $vente += $cl->affaire;
                $clientT ++;
                $credit += $cl->credit;

            }
            foreach($agent as $ag){

                $agentT ++;

            }
            foreach($clientM as $ag){

                $venteM +=$cl->affaire;

            }
            foreach($clientS as $ag){

                $venteS +=$cl->affaire;

            }
            return view('Admin.Home')->with(['vente'=> $vente,'clientT'=>$clientT,'credit'=>$credit,'agentT'=>$agentT,'venteM'=>$venteM,'venteS'=>$venteS]);
        }else{
            return view('acces');
        }

    }else{

        return view('welcome');
    }
});

Route::post('/send_message', function (Request $request ) {

        event( new Message(
            $request->input('username'),
            $request->input('message')
        ));
});

Route::get('/gmail', function ( ) {
    $client = User::where('statut',0)->get();
    return view('Admin.gmail')->with('client',$client);

})->name('gmail');

Route::get('/messageS', function ( ) {

    return view('messageS');

})->name('messageS')->middleware('auth');

Route::get('/messageJ', function ( ) {

    return view('messageJ');

})->name('messageJ')->middleware('auth');

Route::get('/messageB', function ( ) {
    return view('messageB');

})->name('messageB')->middleware('auth');

Route::get('/CGV', function ( ) {

    return view('CGV');

});
Route::get('/Mentions_legales', function ( ) {

    return view('Mentions_legales');

});
Route::get('/contacter', function ( ) {

    return view('contacter');

})->name('contacter');
Route::get('/formulaire_de_retractation', function ( ) {

    return view('formulaire_de_retractation');

})->name('formulaire_de_retractation') ;
Route::get('/blog', function ( ) {
    $blogs = blog::orderBy('created_at', 'desc')->get();

    return view('blog')->with('blogs',$blogs);

});
Route::get('/gblog', function ( ) {
    $blogs = blog::orderBy('created_at', 'desc')->get();

    return view('Admin/gblog')->with('blogs',$blogs);

});

Route::get('/getcredit', function ( ) {
    $users = Auth::user()->credit;

    return response()->json(['user'=>$users]);


})->middleware('auth');


Route::get('/login', function () { return view('auth.login'); });
Route::get('/pack', function () { return view('pack'); });
Route::get('/add_users', function () { if(Auth::user()->statut == 2){ return view('from.add_users');}else { return view('acces'); } })->name('add_users')->middleware('auth');
Route::get('/add_voyants', function () { if(Auth::user()->statut == 2){ return view('from.add_voyants');}else { return view('acces'); } })->name('add_voyants')->middleware('auth');
Route::get('/add_post', function () { if(Auth::user()->statut == 2){ return view('from.add_post');}else { return view('acces'); } })->name('add_post')->middleware('auth');
Route::get('/voyants/login', function () { return view('auth.login'); })->name('voyants');
Route::get('/clients', [App\Http\Controllers\ClientController::class, 'index'])->name('clients')->middleware('auth');
Route::get('/voyants', [App\Http\Controllers\AdminController::class, 'voyants'])->name('voyants')->middleware('auth');

Auth::routes();

    // Route::get('/gmail', [App\Http\Controllers\AdminController::class, 'gmail'])->name('crm_client');
    Route::post('/send_mail', [App\Http\Controllers\MailController::class, 'formRT'])->name('send_mail')->middleware('auth');
    Route::post('/sendContact', [App\Http\Controllers\MailController::class, 'contact'])->name('sendContact')->middleware('auth');
    Route::post('/oneclient', [App\Http\Controllers\MailController::class, 'one'])->name('oneclient')->middleware('auth');
    Route::post('/allclient', [App\Http\Controllers\MailController::class, 'all'])->name('allclient')->middleware('auth');
    Route::get('/contacts', [App\Http\Controllers\MessagesController::class, 'index'])->name('message')->middleware('auth');
    Route::get('/message', [App\Http\Controllers\MessagesController::class, 'index'])->name('message')->middleware('auth');
    Route::get('/conversation/{id}/{voyant}', [App\Http\Controllers\MessagesController::class, 'getMessage'])->name('conversation')->middleware('auth');
    Route::get('/note/{id}', [App\Http\Controllers\MessagesController::class, 'getnote'])->name('note')->middleware('auth');
    Route::get('/conversationuers', [App\Http\Controllers\MessagesController::class, 'getoneMessage'])->name('conversationuers')->middleware('auth');
    Route::get('/conversationuerssi', [App\Http\Controllers\MessagesController::class, 'getoneMessagesi'])->name('conversationuerssi')->middleware('auth');
    Route::get('/conversationuersj', [App\Http\Controllers\MessagesController::class, 'getoneMessagej'])->name('conversationuersj')->middleware('auth');
    Route::get('/conversationuersb', [App\Http\Controllers\MessagesController::class, 'getoneMessageb'])->name('conversationuersb')->middleware('auth');
    Route::post('/conversation/send', [App\Http\Controllers\MessagesController::class, 'send'])->name('conversation/send')->middleware('auth');
    Route::post('/conversation/note', [App\Http\Controllers\MessagesController::class, 'note'])->name('conversation/note')->middleware('auth');
    Route::post('/conversation/senduser', [App\Http\Controllers\MessagesController::class, 'senduser'])->name('conversation/senduser')->middleware('auth');
    // Route::post('/message', [App\Http\Controllers\MessagesController::class, 'index'])->name('message');
    Route::post('/save_message', [App\Http\Controllers\MessagesController::class, 'store'])->name('save_message')->middleware('auth');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/profile', [App\Http\Controllers\User_infoController::class, 'index'])->name('profile')->middleware('auth');
    Route::post('/up_profile{id}', [App\Http\Controllers\User_infoController::class, 'update'])->name('up_profile{id}')->middleware('auth');
    Route::post('/save_users', [App\Http\Controllers\User_infoController::class, 'store'])->name('save_users')->middleware('auth');
    Route::post('/save_time', [App\Http\Controllers\User_infoController::class, 'save_time'])->name('save_time')->middleware('auth');
    Route::post('/save_tag', [App\Http\Controllers\AdminController::class, 'store'])->name('save_tag')->middleware('auth');
    Route::post('/save_post', [App\Http\Controllers\AdminController::class, 'save_post'])->name('save_post')->middleware('auth');
    Route::get('/update{id}', [App\Http\Controllers\ProduitsController::class, 'show'])->name('update{id}')->middleware('auth');
    Route::get('/finMoi{id}', [App\Http\Controllers\User_infoController::class, 'finMoi'])->name('finMoi{id}')->middleware('auth');
    Route::get('/delete_Agent{id}', [App\Http\Controllers\User_infoController::class, 'deleteAgent'])->name('delete_Agent{id}')->middleware('auth');
    Route::get('/delete_poste{id}', [App\Http\Controllers\User_infoController::class, 'deletePoste'])->name('delete_poste{id}')->middleware('auth');
    Route::get('/delete_client{id}', [App\Http\Controllers\User_infoController::class, 'deleteClient'])->name('delete_client{id}')->middleware('auth');
    Route::post('/pakp', [App\Http\Controllers\PackController::class, 'index'])->name('pakp')->middleware('auth');
    Route::post('/pakc', [App\Http\Controllers\PackController::class, 'indexone'])->name('pakp')->middleware('auth');


    Route::get('mollie-payment-success',[MollieController::class, 'paymentSuccess'])->name('mollie.payment.success')->middleware('auth');
    Route::post('mollie-create-payment',[MollieController::class,'createPayment'])->name('mollie.create.payment')->middleware('auth');
    Route::get('create-mollie-subscription',[MollieController::class,'createMollieSubscription'])->name('create.mollie.subscription')->middleware('auth');

    Route::get('/event', function ($message) {
        return $event = event(new NewMessage($message));
        event($event);
    });
    Route::get('/listen', function () {
        return view('listen');
    });
    Route::get('newMessage{id}', function ($id) {

    });






