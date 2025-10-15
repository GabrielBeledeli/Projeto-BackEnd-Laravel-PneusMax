<?php

namespace App\Services\Queries;

use App\Models\Pneus;

class ListarPneusQuery
{
    public function execute()
    {
        return Pneus::with('especificacao')->orderBy('id_pneu', 'desc')->paginate(15);
    }
}