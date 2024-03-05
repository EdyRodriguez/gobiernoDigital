<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Role;

class UserRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::where('slug', 'admin')->first();
        $userRole = Role::where('slug', 'user')->first();

        if (!$adminRole || !$userRole) {
            return;
        }

        $roles = [$adminRole->id, $userRole->id];

        // Obtener todos los usuarios
        $users = User::all();

        foreach ($users as $user) {
            // Asignar aleatoriamente uno de los dos roles
            $randomRoleId = $roles[array_rand($roles)];

            // Insertar en la tabla pivot
            DB::table('user_roles')->insert([
                'user_id' => $user->id,
                'role_id' => $randomRoleId,
            ]);
        }
    }
}
