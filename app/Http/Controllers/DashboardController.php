<?php
namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Services\Queries\ListarPneusQuery;

class DashboardController extends Controller
{
    /**
     * Exibe o painel principal com uma tabela de pneus.
     * Aplica o padrão CQRS: delega a leitura para o handler ListarPneusQuery.
     */
    public function index(): View
    {
        $query = new ListarPneusQuery();
    $pneus = $query->execute();

    return view('dashboard', ['pneus' => $pneus]);
    }
}
