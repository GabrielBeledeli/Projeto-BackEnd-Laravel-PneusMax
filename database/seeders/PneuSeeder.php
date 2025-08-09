<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class PneuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pneu')->insert([
            ['marca'=>'Pirelli','modelo'=>'Scorpion Verde All Season','aro'=>16,'medida'=>'235/60R16','preco'=>699.90,'quantidade_estoque'=>10,'id_especificacao'=>1],
            ['marca'=>'Bridgestone','modelo'=>'Ecopia EP150','aro'=>16,'medida'=>'195/55R16','preco'=>689.90,'quantidade_estoque'=>20,'id_especificacao'=>2],
            ['marca'=>'Firestone','modelo'=>'Destination LE2','aro'=>16,'medida'=>'235/60R16','preco'=>829.90,'quantidade_estoque'=>15,'id_especificacao'=>3],
            ['marca'=>'Pirelli','modelo'=>'Chrono (MO)','aro'=>16,'medida'=>'195/75R16','preco'=>1119.90,'quantidade_estoque'=>17,'id_especificacao'=>4],
            ['marca'=>'Itaro','modelo'=>'IT203','aro'=>14,'medida'=>'185/60R14','preco'=>269.90,'quantidade_estoque'=>30,'id_especificacao'=>5],
            ['marca'=>'Itaro','modelo'=>'IT203','aro'=>15,'medida'=>'185/65R15','preco'=>299.90,'quantidade_estoque'=>12,'id_especificacao'=>6],
            ['marca'=>'Itaro','modelo'=>'IT101','aro'=>17,'medida'=>'215/60R17','preco'=>439.90,'quantidade_estoque'=>21,'id_especificacao'=>7],
            ['marca'=>'Goodyear','modelo'=>'Wrangler Fortitude HT','aro'=>16,'medida'=>'235/60R16','preco'=>824.90,'quantidade_estoque'=>18,'id_especificacao'=>8],
            ['marca'=>'Goodyear','modelo'=>'Wrangler Fortitude HT','aro'=>15,'medida'=>'205/65R15','preco'=>679.90,'quantidade_estoque'=>32,'id_especificacao'=>9],
            ['marca'=>'Goodyear','modelo'=>'Eagle F1 Asymmetric 2 SUV','aro'=>19,'medida'=>'255/50R19','preco'=>1974.90,'quantidade_estoque'=>31,'id_especificacao'=>10],
            ['marca'=>'Goodyear','modelo'=>'Efficientgrip Performance','aro'=>16,'medida'=>'205/55R16','preco'=>579.90,'quantidade_estoque'=>9,'id_especificacao'=>11],
            ['marca'=>'Goodyear','modelo'=>'Wrangler Duratrac','aro'=>16,'medida'=>'285/75R16','preco'=>2274.90,'quantidade_estoque'=>6,'id_especificacao'=>12],
            ['marca'=>'Continental','modelo'=>'ContiSportContact 5','aro'=>18,'medida'=>'245/35R18','preco'=>1699.90,'quantidade_estoque'=>10,'id_especificacao'=>13],
            ['marca'=>'Continental','modelo'=>'ContiCrossContact LX2','aro'=>18,'medida'=>'225/55R18','preco'=>839.90,'quantidade_estoque'=>8,'id_especificacao'=>14],
            ['marca'=>'Continental','modelo'=>'EcoContact 6','aro'=>15,'medida'=>'185/60R15','preco'=>499.90,'quantidade_estoque'=>15,'id_especificacao'=>15],
            ['marca'=>'Barum','modelo'=>'Bravuris 5HM','aro'=>17,'medida'=>'225/45R17','preco'=>419.90,'quantidade_estoque'=>12,'id_especificacao'=>16],
        ]);

    }
}
