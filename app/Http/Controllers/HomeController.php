<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;
use App\Role;
use Auth;
use DB;
use App\User;
use App\Truck;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $permissionCount = DB::select('SELECT COUNT(*) as "permissionCount" FROM permissions');

        $roleCount = DB::select('SELECT COUNT(*) as "roleCount" FROM roles');

        $userCount = DB::select('SELECT COUNT(*) as "userCount" FROM users');

        $companyregisteredCount = DB::select('SELECT COUNT(*) as "companyregisteredCount" FROM companies');

        $totaltrucksCount = DB::select('SELECT COUNT(*) as "totaltrucksCount" FROM trucks');

        $totalfinanceCount = DB::select('SELECT COUNT(*) as "totalfinanceCount" FROM finances');

        $systemusers= User::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
        ->get();
            $chart = Charts::database($systemusers, 'bar', 'highcharts')
            ->setTitle('All Users Chart')
            ->setElementLabel("System Users")
            ->setLabels("users")
            ->setDimensions(1000, 500)
            ->setResponsive(true)
            ->groupByMonth(date('Y'), true);


        $piecharttrucks= Truck::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
        ->get();
            $piechart = Charts::create('pie', 'highcharts')
            ->setTitle('Trucks Chart')
            ->setLabels(['First', 'Second', 'Third'])
            ->setValues([5,10,20])
            ->setDimensions(1000,500)
            ->setResponsive(false);


        return view('home')
            ->with('permissionCount', $permissionCount)
            ->with('userCount', $userCount)
            ->with('roleCount', $roleCount)
            ->with('companyregisteredCount', $companyregisteredCount)
            ->with('totaltrucksCount', $totaltrucksCount)
            ->with('chart', $chart)
            ->with('piechart', $piechart)
            ->with('totalfinanceCount', $totalfinanceCount);
    }
}
