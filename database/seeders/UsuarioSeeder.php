<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $id_usuario_gabiel_hul = DB::table('usuario')->insertGetId(
            [
                'nome'=> 'gabriel_hul',
                'senha'=> 'gabriel123'
            ]
        );
        $id_usuario_caio_gemin = DB::table('usuario')->insertGetId(
            [
                'nome'=> 'caio_gemin',
                'senha'=> 'caio123'
            ]
        );
        $id_usuario_alisson_silva = DB::table('usuario')->insertGetId(
            [
                'nome'=> 'alisson_silva',
                'senha'=> 'alisson123'
            ]
        );
        $id_usuario_sistema = DB::table('usuario')->insertGetId(
            [
                'nome'=> 'sistema',
                'senha'=> 'sistema123'
            ]
        );
    }
}
