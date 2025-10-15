<?php

namespace App\Services\Commands;

use App\Models\Pneus;
use Illuminate\Support\Facades\DB;
use App\Interfaces\PneuFactoryInterface;

/**
 * Classe responsável por criar pneus.
 * Aplica SRP: responsabilidade única.
 * Aplica DIP: depende da abstração PneuFactoryInterface.
 */
class CreatePneuCommand
{
    protected PneuFactoryInterface $factory;

    /**
     * Injeta a factory via construtor (injeção de dependência).
     */
    public function __construct(PneuFactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    /**
     * Executa a criação de um pneu dentro de uma transação.
     *
     * @param array $dados Dados para criação do pneu e especificação.
     * @return Pneus Pneu criado com especificação associada.
     */
    public function execute(array $dados): Pneus
    {
        return DB::transaction(function () use ($dados) {
            return $this->factory->criar($dados);
        });
    }
}