<?php

namespace App\Core\Products\Handlers;

use App\Core\Products\Commands\CreatePneuCommand;
use App\Models\Pneus;

class CreatePneusCommandHandler
{
    protected CreatePneuCommand $command;

    public function __construct(CreatePneuCommand $command)
    {
        $this->command = $command;
    }

    /**
     * Manipula a criação de um pneu.
     *
     * @param array $dados Dados recebidos da requisição ou serviço.
     * @return Pneus
     */
    public function handle(array $dados): Pneus
    {
        return $this->command->execute($dados);
    }
}