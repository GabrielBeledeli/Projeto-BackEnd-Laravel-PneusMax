<?php

namespace App\Reports\Factories;

use App\Interfaces\LogStrategyInterface;
use App\Log\Strategies\LogCriacao;
use App\Log\Strategies\LogEdicao;
use App\Log\Strategies\LogExclusao;

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