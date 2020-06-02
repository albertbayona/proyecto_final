<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        DB::table('proveedores')->insert([
            'nombre' => 'Pepe garcia',
            'empresa' => 'panaderia Pepe',
            'email' => $faker->email,
            'establecimiento_id' => 1,
        ]);
    }
}
