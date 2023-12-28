<?php

use Illuminate\Database\Seeder;
use App\Bodytype;


class BodytypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bodytype = new Bodytype();
        $bodytype->body_type_name='Flat Body';
        $bodytype->save();

        $bodytype = new Bodytype();
        $bodytype->body_type_name ='Trail';
        $bodytype->save();
    }
}
