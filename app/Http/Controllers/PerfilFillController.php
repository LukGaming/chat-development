<?php

namespace App\Http\Controllers;

use App\Models\perfilFill;
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
        return view('perfilFill/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\perfilFill  $perfilFill
     * @return \Illuminate\Http\Response
     */
    public function show(perfilFill $perfilFill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\perfilFill  $perfilFill
     * @return \Illuminate\Http\Response
     */
    public function edit(perfilFill $perfilFill)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\perfilFill  $perfilFill
     * @return \Illuminate\Http\Response
     */
    public function destroy(perfilFill $perfilFill)
    {
        //
    }
}
