<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Insertar roles
        DB::table('roles')->insert([
            [
                'name' => 'Administrador',
                'slug' => 'admin',
                'description' => 'Un usuario que puede consultar, crear, editar y eliminar usuarios.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Usuario',
                'slug' => 'user',
                'description' => 'Un usuario que solo puede consultar datos.',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
