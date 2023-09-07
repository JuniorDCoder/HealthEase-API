<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DoctorRolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $doctor = Role::where('name', 'doctor')->first();
        $permissions = [
            ['name' => 'view all appointments'],
            ['name' => 'approve appointments'],
            ['name' => 'reject appointments'],
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate($permission);
        }

        $doctor->syncPermissions($permissions);
    }
}
