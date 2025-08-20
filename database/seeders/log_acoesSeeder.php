<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class log_acoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $id_usuario_gabriel_hul = DB::table('users')->where('name', 'Gabriel Beledeli Hul')->value('id');
        $id_usuario_caio_gemin = DB::table('users')->where('name', 'Caio Eduardo Gemin Guarienti')->value('id');
        $id_usuario_alisson_silva = DB::table('users')->where('name', 'Alisson Eraldo da Silva')->value('id');

        DB::table('log_acoes')->insert([
            ['id_pneu'=>1, 'id_usuario'=>$id_usuario_gabriel_hul, 'acao'=>'cadastro'],
            ['id_pneu'=>2, 'id_usuario'=>$id_usuario_gabriel_hul, 'acao'=>'cadastro'],
            ['id_pneu'=>3, 'id_usuario'=>$id_usuario_gabriel_hul, 'acao'=>'cadastro'],
            ['id_pneu'=>4, 'id_usuario'=>$id_usuario_gabriel_hul, 'acao'=>'cadastro'],
            ['id_pneu'=>5, 'id_usuario'=>$id_usuario_gabriel_hul, 'acao'=>'cadastro'],
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
