<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('empresas')->insert([
            'nombre' => 'Bayona Corp.',
            'NIF' => 'A89714968',//sacado de un generador automatico
            'pais' => 'españa',
            'provincia' => 'barcelona',
            'municipio' => 'viladecans',
            'codigo_postal' => '08840',
            'calle' => $faker->address,
            'created_at' => date("Y-m-d H:i:s")
        ]);
    }
}
