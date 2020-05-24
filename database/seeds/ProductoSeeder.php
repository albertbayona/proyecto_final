<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productos')->insert([
            'nombre' => 'barra de pan',
            'en_stock' => 3,
            'minimo_recomendable' => 3,
            'proveedor_id' => 1
        ]);
    }
}
