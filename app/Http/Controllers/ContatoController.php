<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use App\Models\last_seen;
use App\Providers\LastSeenProvider;
use App\Models\perfilFill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContatoController extends Controller
{
    public function index(){
        //last_seen::create(['user_id'=>Auth::id()]);
        LastSeenProvider::lastSeenUser(Auth::id());
        $dados_perfil = perfilFill::where('user_id', Auth::id())->first();
        return view('mensagens/index', ['dados_perfil'=>$dados_perfil]);
    }
}
