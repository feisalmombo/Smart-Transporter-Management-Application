<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Role;
use App\Permission;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$dev_permission = Permission::where('slug','create')->first();
        $finance_permission = Permission::where('slug', 'edit')->first();
        $admin_permission = Permission::where('slug', 'manage_users')->first();
        $staff_permission = Permission::where('slug', 'view_trucks')->first();

        //RoleTableSeeder.php
        $dev_role = new Role();
        $dev_role->slug = 'developer';
        $dev_role->name = 'Developer';
        $dev_role->save();
        $dev_role->permissions()->attach($dev_permission);

        $finance_role = new Role();
        $finance_role->slug = 'transporter';
        $finance_role->name = 'Transporter';
        $finance_role->save();
		$finance_role->permissions()->attach($finance_permission);

        $staff_role = new Role();
        $staff_role->slug = 'staff';
        $staff_role->name = 'Staff';
        $staff_role->save();
		$staff_role->permissions()->attach($staff_permission);

        $admin=new Role();
    	$admin->slug = 'administrator';
    	$admin->name = 'Administrator';
    	$admin->save();
		$admin->permissions()->attach($admin_permission);

		$admin=new Role();
    	$admin->slug = 'customer';
    	$admin->name = 'Customer';
    	$admin->save();
		$admin->permissions()->attach($dev_permission);

		$admin=new Role();
    	$admin->slug = 'manager';
    	$admin->name = 'Manager';
    	$admin->save();
		$admin->permissions()->attach($dev_permission);

    }
}
