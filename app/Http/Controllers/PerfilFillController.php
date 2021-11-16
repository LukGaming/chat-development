<?php

namespace App\Http\Controllers;

use App\Http\Livewire\PerfillFillCreate;
use App\Models\perfilFill;
use Illuminate\Support\Facades\Auth;
use Error;
use Illuminate\Http\Request;

class PerfilFillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Verificando se este usuário já preencheu o perfilFill
        $perfilFillDone = perfilFill::where('user_id', Auth::id())->first();
        if( $perfilFillDone){//Se ele já tiver preenchido, retornar ele para pagina de mensagens
            return redirect('/');
        }
        return view('perfilFill/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\perfilFill  $perfilFill
     * @return \Illuminate\Http\Response
     */
    public function show(perfilFill $perfilFill)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\perfilFill  $perfilFill
     * @return \Illuminate\Http\Response
     */
    public function edit(perfilFill $perfilFill)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\perfilFill  $perfilFill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, perfilFill $perfilFill)
    {
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\perfilFill  $perfilFill
     * @return \Illuminate\Http\Response
     */
    public function destroy(perfilFill $perfilFill)
    {
        abort(404);
    }
}
