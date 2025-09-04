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

class PneusController extends Controller
{
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
    public function store(StorePneuRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();

        try {
            DB::beginTransaction();
            $especificacao = Especificacoes::create([
                'largura' => $validatedData['largura'],
                'perfil' => $validatedData['perfil'],
                'indice_peso' => $validatedData['indice_peso'],
                'indice_velocidade' => $validatedData['indice_velocidade'],
                'tipo_construcao' => $validatedData['tipo_construcao'],
                'tipo_terreno' => $validatedData['tipo_terreno'],
                'desenho' => $validatedData['desenho'],
            ]);
            $pneu = Pneus::create([
                'marca' => $validatedData['marca'],
                'modelo' => $validatedData['modelo'],
                'aro' => $validatedData['aro'],
                'medida' => $validatedData['medida'],
                'preco' => $validatedData['preco'],
                'quantidade_estoque' => $validatedData['quantidade_estoque'],
                'id_especificacao' => $especificacao->id_especificacao,
            ]);

            Log_Acoes::create([
                'id_pneu' => $pneu->id_pneu,
                'id_usuario' => Auth::id(),
                'acao' => 'Criação',
                'data_hora' => now(),
            ]);

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

            Log_Acoes::create([
                'id_pneu' => $pneu->id_pneu,
                'id_usuario' => Auth::id(),
                'acao' => 'Edição',
                'data_hora' => now(),
            ]);

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

            Log_Acoes::create([
                'id_pneu' => $pneu->id_pneu,
                'id_usuario' => Auth::id(),
                'acao' => 'Exclusão',
                'data_hora' => now(),
            ]);

            DB::commit();

            return redirect()->route('dashboard')->with('success', 'Pneu excluído com sucesso!');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('dashboard')->with('error', 'Ocorreu um erro ao excluir o pneu.');
        }
    }
}
