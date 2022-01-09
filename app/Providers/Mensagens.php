<?php

namespace App\Providers;

use App\Models\mensagen;
use Illuminate\Support\ServiceProvider;

class Mensagens extends ServiceProvider
{
    public static function createMessage($body, $sendFromUser, $contato) {
        mensagen::create([
            "body" => $body,
            "sendFromUser" => $sendFromUser,
            "sendToUser" => $contato
        ]);
    }
    public static function newMessages($sendFromUser, $sendToUser){
        return mensagen::where('sendFromUser', $sendFromUser)
        ->where('sendToUser', $sendToUser)
        ->orWhere('sendToUser', $sendFromUser )
        ->where('sendFromUser', $sendToUser)
        ->get();
    }
}
