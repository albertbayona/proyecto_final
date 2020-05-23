<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTables([
            'roles'
        ]);
         $this->call(RolesSeeder::class);
    }
    public function truncateTables(array $tablas){
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        foreach ($tablas as $tabla){
            DB::table($tabla)->truncate();//vacia la tabla y las sentecias sql lo permiten
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
