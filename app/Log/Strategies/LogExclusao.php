<?php

namespace App\Log\Strategies;

use App\Models\Pneus;
use App\Models\Log_Acoes;
use App\Interfaces\LogStrategyInterface;
use Illuminate\Support\Facades\Auth;

class LogExclusao implements LogStrategyInterface {
    public function registrar(Pneus $pneu): void {
        Log_Acoes::create([
            'id_pneu' => $pneu->id_pneu,
            'id_usuario' => Auth::id(),
            'acao' => 'Exclusão',
            'data_hora' => now(),
        ]);
    }
}