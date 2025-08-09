<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class LogAcaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $id_usuario_gabiel_hul = DB::table('usuario')->where('nome', 'gabriel_hul')->value('id_usuario');
        $id_usuario_caio_gemin = DB::table('usuario')->where('nome', 'caio_gemin')->value('id_usuario');
        $id_usuario_alisson_silva = DB::table('usuario')->where('nome', 'alisson_silva')->value('id_usuario');
        $id_usuario_sistema = DB::table('usuario')->where('nome', 'sistema')->value('id_usuario');

        DB::table('log_acao')->insert([
            ['id_pneu'=>1, 'id_usuario'=>$id_usuario_gabiel_hul, 'acao'=>'cadastro'],
            ['id_pneu'=>2, 'id_usuario'=>$id_usuario_gabiel_hul, 'acao'=>'cadastro'],
            ['id_pneu'=>3, 'id_usuario'=>$id_usuario_gabiel_hul, 'acao'=>'cadastro'],
            ['id_pneu'=>4, 'id_usuario'=>$id_usuario_gabiel_hul, 'acao'=>'cadastro'],
            ['id_pneu'=>5, 'id_usuario'=>$id_usuario_gabiel_hul, 'acao'=>'cadastro'],
            ['id_pneu'=>6, 'id_usuario'=>$id_usuario_caio_gemin, 'acao'=>'cadastro'],
            ['id_pneu'=>7, 'id_usuario'=>$id_usuario_caio_gemin, 'acao'=>'cadastro'],
            ['id_pneu'=>8, 'id_usuario'=>$id_usuario_caio_gemin, 'acao'=>'cadastro'],
            ['id_pneu'=>9, 'id_usuario'=>$id_usuario_caio_gemin, 'acao'=>'cadastro'],
            ['id_pneu'=>10, 'id_usuario'=>$id_usuario_caio_gemin, 'acao'=>'cadastro'],
            ['id_pneu'=>11, 'id_usuario'=>$id_usuario_caio_gemin, 'acao'=>'cadastro'],
            ['id_pneu'=>12, 'id_usuario'=>$id_usuario_alisson_silva, 'acao'=>'cadastro'],
            ['id_pneu'=>13, 'id_usuario'=>$id_usuario_alisson_silva, 'acao'=>'cadastro'],
            ['id_pneu'=>14, 'id_usuario'=>$id_usuario_alisson_silva, 'acao'=>'cadastro'],
            ['id_pneu'=>15, 'id_usuario'=>$id_usuario_alisson_silva, 'acao'=>'cadastro'],
            ['id_pneu'=>16, 'id_usuario'=>$id_usuario_alisson_silva, 'acao'=>'cadastro'],
        ]);

    }
}
