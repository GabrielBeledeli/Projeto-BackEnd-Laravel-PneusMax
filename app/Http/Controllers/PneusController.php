<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePneuRequest;
use App\Models\Pneus;
use App\Models\Especificacoes;
use App\Models\Log_Acoes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\PneuFactoryInterface;
use App\Reports\Factories\PneuFactory;
use App\Reports\Factories\LogFactory;
use App\Services\Commands\CreatePneuCommand;

class PneusController extends Controller
{

    protected CreatePneuCommand $createCommand;

    /**
     * Injeção de dependência do handler de criação.
     */
    public function __construct(CreatePneuCommand $createCommand)
    {
        $this->createCommand = $createCommand;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pneus.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    //Funcao refatorada
public function store(StorePneuRequest $request): RedirectResponse
{
    $validatedData = $request->validated();

    try {
        DB::beginTransaction();

        // Usa o handler injetado
        $pneu = $this->createCommand->execute($validatedData);

        // Utilizando o padrão Strategy
        $log = LogFactory::criar('criar');
        $log->registrar($pneu);

        DB::commit();
        return redirect()->route('dashboard')->with('success', 'Pneu cadastrado com sucesso!');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', 'Ocorreu um erro ao cadastrar o pneu. Tente novamente.')->withInput();
    }
}

    /**
     * Display the specified resource.
     */
    public function show(Pneus $pneu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pneus $pneu)
    {
        return view('pneus.edit', ['pneu' => $pneu]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pneus $pneu): RedirectResponse
    {
        $validatedData = $request->validate([
            'marca' => 'required|string|max:20',
            'modelo' => 'required|string|max:30',
            'aro' => 'required|integer',
            'medida' => 'required|string|max:10',
            'preco' => 'required|numeric',
            'quantidade_estoque' => 'required|integer',
            'largura' => 'required|integer',
            'perfil' => 'required|string|max:3',
            'indice_peso' => 'nullable|string|max:20',
            'indice_velocidade' => 'nullable|string|max:20',
            'tipo_construcao' => 'required|string|max:20',
            'tipo_terreno' => 'nullable|string|max:2',
            'desenho' => 'required|string|max:15',
        ]);

        try {
            DB::beginTransaction();

            $pneu->update($validatedData);

            if ($pneu->especificacao) {
                $pneu->especificacao->update($validatedData);
            }
            //Utilizando o padrao Strategy 
            $log = LogFactory::criar('editar');
            $log->registrar($pneu);

            DB::commit();

            return redirect()->route('dashboard')->with('success', 'Pneu atualizado com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Ocorreu um erro ao atualizar o pneu. Tente novamente.')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pneus $pneu): RedirectResponse
    {
        try {
            DB::beginTransaction();

            // Soft delete the tire
            $pneu->delete();

            // Soft delete the related specification
            if ($pneu->especificacao) {
                $pneu->especificacao->delete();
            }

            //Utilizando o padrao Strategy 
            $log = LogFactory::criar('excluir');
            $log->registrar($pneu);

            DB::commit();

            return redirect()->route('dashboard')->with('success', 'Pneu excluído com sucesso!');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('dashboard')->with('error', 'Ocorreu um erro ao excluir o pneu.');
        }
    }
}
