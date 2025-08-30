<?php

namespace App\Http\Controllers;

use App\Models\Pneus;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Exibe o painel principal com uma tabela de pneus.
     */
    public function index(): View
    {
        // Busca todos os pneus de forma paginada (15 por página).
        // O método `with('especificacao')` carrega a especificação de cada pneu
        // em uma única consulta adicional, o que é muito eficiente.
        $pneus = Pneus::with('especificacao')->orderBy('id_pneu', 'desc')->paginate(15);

        // Retorna a view 'dashboard' e passa a coleção de pneus paginada.
        return view('dashboard', ['pneus' => $pneus]);
    }
}
