<?php

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('messages.{id}', function ($user, $id) {
    Log::info("Vérification pusher de l'accès au canal pour l'utilisateur ID: {$user->id}, Canal ID: {$id}");
    return $user->id === (int)$id;
    if( Auth::check()){
        return ['id'=>$user->id, 'name'=>$user->name];
    }
});


