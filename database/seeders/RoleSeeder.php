<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles
        $rolePreparer = Role::firstOrCreate(['name' => 'Preparer']);
        $roleApprover = Role::firstOrCreate(['name' => 'Approver']);

        // Create permissions
        $permissionCreateTransaction = Permission::create(['name' => 'create transaction']);
        $permissionApproveTransaction = Permission::create(['name' => 'approve transaction']);
        $permissionViewTransaction = Permission::create(['name' => 'view transaction']);

        //Assign permissions to roles
        $rolePreparer->givePermissionTo($permissionCreateTransaction);
        $rolePreparer->givePermissionTo($permissionViewTransaction); // Preparers can also view

        $roleApprover->givePermissionTo($permissionApproveTransaction);
        $roleApprover->givePermissionTo($permissionViewTransaction);
        
        User::find(1)->assignRole('Preparer');
        User::find(2)->assignRole('Approver');
    }
}
