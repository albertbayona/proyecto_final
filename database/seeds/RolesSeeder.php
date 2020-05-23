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
        //
        DB::table('roles')->insert([
            'nombre' => 'empresa'
        ]);
        DB::table('roles')->insert([
            'nombre' => 'gestor'
        ]);
        DB::table('roles')->insert([
            'nombre' => 'camarero'
        ]);
        DB::table('roles')->insert([
            'nombre' => 'cocinero'
        ]);
    }
}
