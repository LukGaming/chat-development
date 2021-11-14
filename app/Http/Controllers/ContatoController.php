<?php

namespace App\Http\Controllers;

use App\Models\perfilFill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContatoController extends Controller
{
    public function index(){
        $dados_perfil = perfilFill::where('user_id', Auth::id())->first();
        return view('mensagens/index', ['dados_perfil'=>$dados_perfil]);
    }
}
