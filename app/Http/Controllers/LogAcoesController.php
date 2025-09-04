<?php

namespace App\Http\Controllers;

use App\Models\Log_Acoes;
use Illuminate\Http\Request;

class LogAcoesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logs = Log_Acoes::with([
            'pneu' => fn ($query) => $query->withTrashed(), 
            'user'
        ])->latest('data_hora')->get();
        
        return view('pneus.log', ['logs' => $logs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Log_Acoes $log_Acoes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Log_Acoes $log_Acoes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Log_Acoes $log_Acoes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Log_Acoes $log_Acoes)
    {
        //
    }
}
