<?php

namespace App\Interfaces;

use App\Models\Pneus;

interface PneuFactoryInterface {
    public function criar(array $dados): Pneus;
}