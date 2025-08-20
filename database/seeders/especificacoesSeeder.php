<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class especificacoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('especificacoes')->insert([
            ['largura'=>235, 'perfil'=>'60%', 'indice_peso'=>'100 - 800 kg', 'indice_velocidade'=>'H - 210 km/h', 'tipo_construcao'=>'Radial', 'tipo_terreno'=>'HT', 'desenho'=>'Assimétrico'],
            ['largura'=>195, 'perfil'=>'55%', 'indice_peso'=>'87 - 545 kg', 'indice_velocidade'=>'V - 240 km/h', 'tipo_construcao'=>'Radial', 'tipo_terreno'=>'HT', 'desenho'=>'Simétrico'],
            ['largura'=>235, 'perfil'=>'60%', 'indice_peso'=>'100 - 800 Kg', 'indice_velocidade'=>'V - 240 km/h', 'tipo_construcao'=>'Radial', 'tipo_terreno'=>'HT', 'desenho'=>'Assimétrico'],
            ['largura'=>195, 'perfil'=>'75%', 'indice_peso'=>'107 - 975 kg', 'indice_velocidade'=>'R - 170 km/h', 'tipo_construcao'=>'Radial', 'tipo_terreno'=>'Não Especificado', 'desenho'=>'Não Especificado'],
            ['largura'=>185, 'perfil'=>'60%', 'indice_peso'=>'82 - 475 kg', 'indice_velocidade'=>'H - 210 km/h', 'tipo_construcao'=>'Radial', 'tipo_terreno'=>'HT', 'desenho'=>'Assimétrico'],
            ['largura'=>185, 'perfil'=>'65%', 'indice_peso'=>'88 - 560 kg', 'indice_velocidade'=>'H - 210 km/h', 'tipo_construcao'=>'Radial', 'tipo_terreno'=>'HT', 'desenho'=>'Assimétrico'],
            ['largura'=>215, 'perfil'=>'60%', 'indice_peso'=>'96 - 710 kg', 'indice_velocidade'=>'H - 210 km/h', 'tipo_construcao'=>'Radial', 'tipo_terreno'=>'HT', 'desenho'=>'Simétrico'],
            ['largura'=>235, 'perfil'=>'60%', 'indice_peso'=>'100 - 800 kg', 'indice_velocidade'=>'H - 210 km/h', 'tipo_construcao'=>'Radial', 'tipo_terreno'=>'HT', 'desenho'=>'Simétrico'],
            ['largura'=>205, 'perfil'=>'65%', 'indice_peso'=>'94 - 670 kg', 'indice_velocidade'=>'H - 210 km/h', 'tipo_construcao'=>'Radial', 'tipo_terreno'=>'HT', 'desenho'=>'Simétrico'],
            ['largura'=>255, 'perfil'=>'50%', 'indice_peso'=>'103 - 875 kg', 'indice_velocidade'=>'Y - 300 km/h', 'tipo_construcao'=>'Radial', 'tipo_terreno'=>'HT', 'desenho'=>'Assimétrico'],
            ['largura'=>205, 'perfil'=>'55%', 'indice_peso'=>'91 - 615 kg', 'indice_velocidade'=>'V - 240 km/h', 'tipo_construcao'=>'Radial', 'tipo_terreno'=>'HT', 'desenho'=>'Assimétrico'],
            ['largura'=>285, 'perfil'=>'75%', 'indice_peso'=>'126 - 1700 kg', 'indice_velocidade'=>'Q - 160 km/h', 'tipo_construcao'=>'Radial', 'tipo_terreno'=>'MT', 'desenho'=>'Simétrico'],
            ['largura'=>245, 'perfil'=>'35%', 'indice_peso'=>'92 - 630 kg', 'indice_velocidade'=>'Y - 300 km/h', 'tipo_construcao'=>'Radial', 'tipo_terreno'=>'HT', 'desenho'=>'Assimétrico'],
            ['largura'=>225, 'perfil'=>'55%', 'indice_peso'=>'98 - 750 kg', 'indice_velocidade'=>'V - 240 km/h', 'tipo_construcao'=>'Radial', 'tipo_terreno'=>'HT', 'desenho'=>'Simétrico'],
            ['largura'=>185, 'perfil'=>'60%', 'indice_peso'=>'88 - 560 kg', 'indice_velocidade'=>'H - 210 km/h', 'tipo_construcao'=>'Radial', 'tipo_terreno'=>'HT', 'desenho'=>'Assimétrico'],
            ['largura'=>225, 'perfil'=>'45%', 'indice_peso'=>'94 - 670 kg', 'indice_velocidade'=>'W - 270 km/h', 'tipo_construcao'=>'Radial', 'tipo_terreno'=>'HT', 'desenho'=>'Assimétrico'],
        ]);

    }
}
