<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $faker = Faker\Factory::create();
//        $faker->dateTime($max = 'now');
        DB::table('roles')->insert([
            'nombre' => 'empresa',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('roles')->insert([
            'nombre' => 'gestor',
            'created_at' => date("Y-m-d H:i:s")
        ]);

//        DB::table('roles')->insert([
//            'nombre' => 'camarero',
//            'created_at' => date("Y-m-d H:i:s")
//        ]);
//
//        DB::table('roles')->insert([
//            'nombre' => 'cocinero',
//            'created_at' => date("Y-m-d H:i:s")
//        ]);
    }
}
