<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            'nombre' => 'cocinados'
            ]);
        DB::table('categorias')->insert([
            'nombre' => 'bocadillos'
            ]);
        DB::table('categorias')->insert([
            'nombre' => 'refrescos y agua'
            ]);
        DB::table('categorias')->insert([
            'nombre' => 'bebidas alcoholicas'
            ]);
    }
}
