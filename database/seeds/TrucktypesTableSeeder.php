<?php

use Illuminate\Database\Seeder;
use App\Trucktype;

class TrucktypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trucktype = new Trucktype();
        $trucktype->truck_name='Local';
        $trucktype->save();

        $trucktype = new Trucktype();
        $trucktype->truck_name ='Transit';
        $trucktype->save();
    }
}
