<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create default roles
        $doctor = Role::create(['name' => 'doctor']);
        $patient = Role::create(['name' => 'patient']);

        // Create permissions
        Permission::create(['name' => 'book appointment']);

        // Assign permission to role
        $patient->givePermissionTo('book appointment');

        // Create test users and assign roles
        $user = User::factory()->create();
        $user->assignRole('patient');

        $user = User::factory()->create();
        $user->assignRole('doctor');
    }
}
