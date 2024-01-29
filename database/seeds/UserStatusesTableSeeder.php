<?php

use Illuminate\Database\Seeder;
use App\UserStatus;

class UserStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userstatus = new UserStatus();
        $userstatus->user_id='1';
        $userstatus->slug='1';
        $userstatus->created_at='2024-01-18 00:00:00';
        $userstatus->updated_at='2024-01-18 00:00:00';
        $userstatus->save();
    }
}
