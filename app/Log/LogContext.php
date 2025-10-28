<?php
// app/Log/LogContext.php
namespace App\Log;

use App\Models\Pneus;
use App\Interfaces\LogStrategyInterface;

class LogContext
{
    private LogStrategyInterface $estrategia;

    public function __construct(LogStrategyInterface $estrategia)
    {
        $this->estrategia = $estrategia;
    }

    // Getter
    public function getEstrategia(): LogStrategyInterface
    {
        return $this->estrategia;
    }

    // Setter
    public function setEstrategia(LogStrategyInterface $estrategia): void
    {
        $this->estrategia = $estrategia;
    }

    // Executa a estratégia atual
    public function executar(Pneus $pneu): void
    {
        $this->estrategia->registrar($pneu);
    }
}