<?php

namespace App\Interfaces;

use App\Models\Pneus;

interface LogStrategyInterface {
    public function registrar(Pneus $pneu): void;
}