<?php

use Illuminate\Database\Seeder;
use App\Permissions\HasPermissionsTrait;
use App\Role;
use App\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dev_role = Role::where('slug','developer')->first();
        $manager_role = Role::where('slug', 'manager')->first();
        $admin_role = Role::where('slug', 'administrator')->first();
        $staff_role = Role::where('slug', 'staff')->first();
        $finance_role = Role::where('slug', 'finance')->first();

        $createTasks = new Permission();
        $createTasks->slug = 'create';
        $createTasks->name = 'Create';
        $createTasks->save();
        $createTasks->roles()->attach($dev_role);

        $viewTrucks = new Permission();
        $viewTrucks->slug = 'view_trucks';
        $viewTrucks->name = 'view_trucks';
        $viewTrucks->save();
        $viewTrucks->roles()->attach($staff_role);

        $editUsers = new Permission();
        $editUsers->slug = 'edit';
        $editUsers->name = 'Edit';
        $editUsers->save();
        $editUsers->roles()->attach($manager_role);
        
        $editUsers = new Permission();
        $editUsers->slug = 'delete';
        $editUsers->name = 'Delete';
        $editUsers->save();
        $editUsers->roles()->attach($manager_role);
        
        $editUsers = new Permission();
        $editUsers->slug = 'update';
        $editUsers->name = 'Update';
        $editUsers->save();
        $editUsers->roles()->attach($manager_role);
        
        $editUsers = new Permission();
        $editUsers->slug = 'manage_users';
        $editUsers->name = 'manage users';
        $editUsers->save();
        $editUsers->roles()->attach($admin_role);
        
    }
}
