<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstablecimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('establecimientos')->insert([
            'nombre' => 'Bar artero',
            'pais' => 'españa',
            'provincia' => 'barcelona',
            'municipio' => 'viladecans',
            'codigo_postal' => '08840',
            'mesas'=> 3,
            'calle' => $faker->address,
            'created_at' => date("Y-m-d H:i:s"),
            'empresa_id' => 1
        ]);
    }
}
