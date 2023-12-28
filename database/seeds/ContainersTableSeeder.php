<?php

use Illuminate\Database\Seeder;
use App\Container;


class ContainersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $container = new Container();
        $container->container_name='20 Fit Container';
        $container->save();

        $container = new Container();
        $container->container_name ='40 Fit Container';
        $container->save();

        $container = new Container();
        $container->container_name ='Loose Cargo';
        $container->save();
    }
}
