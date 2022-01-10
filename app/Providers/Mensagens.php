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
    public static function updateMessageSeen($contato, $sendFromUser){
        
        return mensagen::where('sendFromUser', $contato)->where('sendToUser', $sendFromUser,)->update(["read" => 1]);
    }
    public static function getAllMessages($user, $contato){
        return mensagen::where('sendFromUser', $user)
        ->where('sendToUser', $contato)
        ->orWhere('sendToUser',$user)
        ->where('sendFromUser', $contato)
            ->get();
    }
    public static function deleteMensagem($id){
        return mensagen::where('id', $id)->delete();
    }
}
