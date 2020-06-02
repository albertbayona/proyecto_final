<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('platos')->insert([
            'nombre' => 'bocadillos de jamon',
            'precio' => 7.5,
            'categoria_id' => 2,
            'establecimiento_id' => 1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
    }
}
