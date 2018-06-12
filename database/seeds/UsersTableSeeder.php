<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'Superadmin']);
        $permission = Permission::create(['name' => 'edit_user']);
        $permission->assignRole($role);
        $user = App\User::create([
            'name' => 'Martin Gustavo Kluck',
            'email' => 'martinkluck05@gmail.com',
            'password' => bcrypt('mgkluck05')
        ]);
        $user->assignRole('Superadmin');
    }
}
