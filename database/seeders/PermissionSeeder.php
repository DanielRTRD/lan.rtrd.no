<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $r1 = Role::firstOrCreate(["name" => "super-admin"]);
        Role::firstOrCreate(["name" => "admin"]);

        $p1 = Permission::firstOrCreate(['name' => 'manage.users']);

        $r1->givePermissionTo($p1->name);

        $user = User::find(1);
        if($user) {
            $user->assignRole($r1);
        }

    }
}
