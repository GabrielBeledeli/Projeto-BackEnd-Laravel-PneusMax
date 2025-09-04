<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Requests\StorePneuRequest;
use Illuminate\Support\Facades\Validator;

class validacao_pneu_request_test extends TestCase
{
    /**
     * Testa se a validação passa com dados válidos.
     *
     * @return void
     */
    public function test_validacao_passa_com_dados_validos()
    {
        $data = [
            'marca' => 'Pirelli',
            'modelo' => 'P Zero',
            'aro' => 18,
            'medida' => '225/40',
            'preco' => 750.50,
            'quantidade_estoque' => 100,
            'largura' => 225,
            'perfil' => '40',
            'indice_peso' => '92',
            'indice_velocidade' => 'Y',
            'tipo_construcao' => 'Radial',
            'tipo_terreno' => 'HT',
            'desenho' => 'Assimétrico',
        ];

        $request = new StorePneuRequest();
        $validator = Validator::make($data, $request->rules());

        $this->assertFalse($validator->fails());
    }

    /**
     * Testa se a validação falha quando a marca está ausente.
     *
     * @return void
     */
    public function test_validacao_falha_quando_marca_esta_ausente()
    {
        $data = [
            // 'marca' is missing
            'modelo' => 'P Zero',
            'aro' => 18,
            'medida' => '225/40',
            'preco' => 750.50,
            'quantidade_estoque' => 100,
            'largura' => 225,
            'perfil' => '40',
            'indice_peso' => '92',
            'indice_velocidade' => 'Y',
            'tipo_construcao' => 'Radial',
            'tipo_terreno' => 'HT',
            'desenho' => 'Assimétrico',
        ];

        $request = new StorePneuRequest();
        $validator = Validator::make($data, $request->rules());

        $this->assertTrue($validator->fails());
        $this->assertArrayHasKey('marca', $validator->errors()->toArray());
    }
}
