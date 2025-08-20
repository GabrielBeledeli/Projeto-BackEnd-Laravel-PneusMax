<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Gabriel Beledeli Hul',
            'email' => 'engs-gabrielhul@camporeal.edu.br',
            'password' => Hash::make('gabriel123'),
        ]);
        
        User::create([
            'name' => 'Caio Eduardo Gemin Guarienti',
            'email' => 'engs-caioguarienti@camporeal.edu.br',
            'password' => Hash::make('caio123'),
        ]);

        User::create([
            'name' => 'Alisson Eraldo da Silva',
            'email' => 'engs-alissonsilva@camporeal.edu.br',
            'password' => Hash::make('alisson123'),
        ]);
    }
}
