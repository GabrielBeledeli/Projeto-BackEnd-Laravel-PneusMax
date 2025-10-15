<?php

namespace App\Reports\Factories;

use App\Models\Pneus;
use App\Models\Especificacoes;
use App\Interfaces\PneuFactoryInterface;

class PneuFactory implements PneuFactoryInterface {
    public function criar(array $dados): Pneus {
        $especificacao = Especificacoes::create([
            'largura' => $dados['largura'],
            'perfil' => $dados['perfil'],
            'indice_peso' => $dados['indice_peso'],
            'indice_velocidade' => $dados['indice_velocidade'],
            'tipo_construcao' => $dados['tipo_construcao'],
            'tipo_terreno' => $dados['tipo_terreno'],
            'desenho' => $dados['desenho'],
        ]);

        return Pneus::create([
            'marca' => $dados['marca'],
            'modelo' => $dados['modelo'],
            'aro' => $dados['aro'],
            'medida' => $dados['medida'],
            'preco' => $dados['preco'],
            'quantidade_estoque' => $dados['quantidade_estoque'],
            'id_especificacao' => $especificacao->id_especificacao,
        ]);
    }
}
