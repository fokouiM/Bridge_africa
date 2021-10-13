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

    return view('CGV');

});
Route::get('/CGV', function ( ) {

    return view('CGV');

});
Route::get('/Mentions_legales', function ( ) {

    return view('Mentions_legales');

});
Route::get('/contacter', function ( ) {

    return view('contacter');

});
Route::get('/formulaire_de_retractation', function ( ) {

    return view('formulaire_de_retractation');

});
Route::get('/blog', function ( ) {
    $blog = blog::orderBy('created_at', 'desc')->first();

    return view('blog')->with('blog',$blog);

});


Route::get('/login', function () { return view('auth.login'); });
Route::get('/pack', function () { return view('pack'); });
Route::get('/add_users', function () { if(Auth::user()->statut == 2){ return view('from.add_users');}else { return view('acces'); } })->name('add_users');
Route::get('/add_voyants', function () { if(Auth::user()->statut == 2){ return view('from.add_voyants');}else { return view('acces'); } })->name('add_voyants');
Route::get('/voyants/login', function () { return view('auth.login'); })->name('voyants');
Route::get('/clients', [App\Http\Controllers\ClientController::class, 'index'])->name('clients');
Route::get('/voyants', [App\Http\Controllers\AdminController::class, 'voyants'])->name('voyants');

Auth::routes();


    // Route::get('/gmail', [App\Http\Controllers\AdminController::class, 'gmail'])->name('crm_client');
    Route::post('/send_mail', [App\Http\Controllers\MailController::class, 'formRT'])->name('send_mail');
    Route::post('/sendContact', [App\Http\Controllers\MailController::class, 'contact'])->name('sendContact');
    Route::get('/contacts', [App\Http\Controllers\MessagesController::class, 'index'])->name('message');
    Route::get('/message', [App\Http\Controllers\MessagesController::class, 'index'])->name('message');
    Route::get('/conversation/{id}/{voyant}', [App\Http\Controllers\MessagesController::class, 'getMessage'])->name('conversation');
    Route::post('/conversation/send', [App\Http\Controllers\MessagesController::class, 'send'])->name('conversation/send');
    // Route::post('/message', [App\Http\Controllers\MessagesController::class, 'index'])->name('message');
    Route::post('/save_message', [App\Http\Controllers\MessagesController::class, 'store'])->name('save_message');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/profile', [App\Http\Controllers\User_infoController::class, 'index'])->name('profile');
    Route::post('/up_profile{id}', [App\Http\Controllers\User_infoController::class, 'update'])->name('up_profile{id}');
    Route::post('/save_users', [App\Http\Controllers\User_infoController::class, 'store'])->name('save_users');
    Route::post('/save_time', [App\Http\Controllers\User_infoController::class, 'save_time'])->name('save_time');
    Route::post('/save_tag', [App\Http\Controllers\AdminController::class, 'store'])->name('save_tag');
    Route::get('/update{id}', [App\Http\Controllers\ProduitsController::class, 'show'])->name('update{id}');
    Route::get('/finMoi{id}', [App\Http\Controllers\User_infoController::class, 'finMoi'])->name('finMoi{id}');
    Route::get('/delete_Agent{id}', [App\Http\Controllers\User_infoController::class, 'deleteAgent'])->name('delete_Agent{id}');
    Route::get('/delete_client{id}', [App\Http\Controllers\User_infoController::class, 'deleteClient'])->name('delete_client{id}');






