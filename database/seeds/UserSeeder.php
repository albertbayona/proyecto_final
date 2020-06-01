<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $rolesIDs = DB::table('roles')->pluck('id');//array de roles
        $faker = Faker\Factory::create();

        DB::table('usuarios')->insert([
            'nombre' => 'Bayona Corp.',
            'email' => 'empresa@example.com',
            'password' => bcrypt('asdasdasd'),
            'rol_id' => 1,
            'establecimiento_id' => 1,
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('usuarios')->insert([
            'nombre' => $faker->firstName,
            'apellidos' => $faker->lastName,
            'email' => 'gestor@example.com',
            'password' => bcrypt('asdasdasd'),
            'rol_id' => 2,
            'establecimiento_id' => 1,
            'created_at' => date("Y-m-d H:i:s")
        ]);

//        for ($i = 1; $i <= 3; $i++){
//            DB::table('usuarios')->insert([
//                'nombre' => $faker->firstName,
//                'apellidos' => $faker->lastName,
//                'email' => 'camarero'.$i.'@example.com',
//                'password' => bcrypt('asdasdasd'),
//                'rol_id' => 3,
//                'establecimiento_id' => 1,
//                'created_at' => date("Y-m-d H:i:s")
//            ]);
//        }
//        for ($i = 1; $i <= 2; $i++){
//            DB::table('usuarios')->insert([
//                'nombre' => $faker->firstName,
//                'apellidos' => $faker->lastName,
//                'email' => 'cocinero'.$i.'@example.com',
//                'password' => bcrypt('asdasdasd'),
//                'rol_id' => 4,
//                'establecimiento_id' => 1,
//                'created_at' => date("Y-m-d H:i:s")
//            ]);
//        }
    }
}
