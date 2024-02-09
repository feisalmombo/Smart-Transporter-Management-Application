<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use Auth;
use DB;

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

        // $transporterCount = DB::select('SELECT COUNT(*) as "transporterCount" FROM adds_new_drivers');
        // $vehicleCount = DB::select('SELECT COUNT(*) as "vehicleCount" FROM adds_new_vehicles');
        // $RequestcustomersCount = DB::select('SELECT COUNT(*) as "requestcustomersCount" FROM request_customers');
        // $RequestitemsCount = DB::select('SELECT COUNT(*) as "requestitemsCount" FROM request_items');


        $roleCount = DB::select('SELECT COUNT(*) as "roleCount" FROM roles');

        $userCount = DB::select('SELECT COUNT(*) as "userCount" FROM users');

        $companyregisteredCount = DB::select('SELECT COUNT(*) as "companyregisteredCount" FROM companies');

        // $attendedRequestCount = DB::select('SELECT COUNT(*) as "attendedRequestCount" FROM after_attends');
        // $bodyTypeCount = DB::select('SELECT COUNT(*) as "bodyTypeCount" FROM bodytypes');
        // $containerTypeCount = DB::select('SELECT COUNT(*) as "containerTypeCount" FROM containers');
        // $truckTypeCount = DB::select('SELECT COUNT(*) as "truckTypeCount" FROM trucktypes');
        // $trailerNumberCount = DB::select('SELECT COUNT(*) as "trailerNumberCount" FROM trailers');


        return view('home')
            ->with('permissionCount', $permissionCount)
            ->with('userCount', $userCount)
            ->with('roleCount', $roleCount)
            ->with('companyregisteredCount', $companyregisteredCount);
    }
}
