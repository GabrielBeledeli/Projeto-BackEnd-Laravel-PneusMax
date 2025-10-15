<?php

namespace App\Reports\Factories;

use App\Interfaces\LogStrategyInterface;
use App\Reports\Implementations\LogCriacao;
use App\Reports\Implementations\LogEdicao;
use App\Reports\Implementations\LogExclusao;

class LogFactory {
    public static function criar(string $acao): LogStrategyInterface {
        return match($acao) {
            'criar' => new LogCriacao(),
            'editar' => new LogEdicao(),
            'excluir' => new LogExclusao(),
            default => throw new \Exception("Ação de log desconhecida"),
        };
    }
}