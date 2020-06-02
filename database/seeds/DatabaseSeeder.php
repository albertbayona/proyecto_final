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
        /*$this->truncateTables([
            'roles',
            'empresas',
            'establecimientos',
            'usuarios',
            'categorias',
            'platos',
            'pedidos',
            'platos_pedidos',
            'proveedores',
            'productos',
            'ingredientes'
        ]);*/
         $this->call([
             RolesSeeder::class,
             EmpresaSeeder::class,
             EstablecimientoSeeder::class,
             UserSeeder::class,
             CategoriaSeeder::class,
             PlatoSeeder::class,
             PedidoSeeder::class,
             PlatoPedidoSeeder::class,
             ProveedorSeeder::class,
             ProductoSeeder::class,
             IngredienteSeeder::class
         ]);
    }
    public function truncateTables(array $tablas){
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        foreach ($tablas as $tabla){
            DB::table($tabla)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
