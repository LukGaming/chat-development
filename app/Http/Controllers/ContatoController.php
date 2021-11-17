<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use App\Models\perfilFill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ContatoController extends Controller
{
    public function index(){
        $dados_perfil = perfilFill::where('user_id', Auth::id())->first();
        //dd($dados_perfil);
        return view('mensagens/index', ['dados_perfil'=>$dados_perfil]);
    }
}
