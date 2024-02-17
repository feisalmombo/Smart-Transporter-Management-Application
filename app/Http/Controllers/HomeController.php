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
        // DEVELOPER SIDE
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
                ->setElementLabel("Users")
                ->setDimensions(1000, 500)
                ->setResponsive(true)
                ->groupByMonth(date('Y'), true);


            $piecharttrucks= Truck::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->get();
                $piechart = Charts::database(Truck::all(), 'bar', 'highcharts')
                ->setTitle('All Trucks Chart')
                ->setElementLabel("Total")
                ->setDimensions(1000, 500)
                ->setResponsive(false)
                ->groupByYear();
            // DEVELOPER SIDE


            // TRANSPORTER SIDE
                    $transporter_id = Auth::user()->id;

                    $truckByTransporterCount = DB::table('trucks')
                        ->join('companies', 'trucks.company_id', '=', 'companies.id')
                        ->join('users', 'trucks.user_id', '=', 'users.id')

                        ->select('trucks.id', 'trucks.truck_number', 'trucks.trailer_number', 'trucks.dengla_number', 'trucks.tonnage', 'trucks.container_number', 'trucks.driver_full_name', 'trucks.driver_phone_number', 'trucks.driver_licence_number', 'trucks.driver_passport_number', 'trucks.passport_attachment', 'trucks.licence_attachment',
                        'users.first_name', 'users.middle_name', 'users.last_name', 'users.email', 'companies.company_name', 'trucks.created_at')
                        ->where('companies.user_id', '=', $transporter_id)->count();


                    $companyByTransporterCount = DB::table('companies')
                    ->join('users', 'companies.user_id', '=', 'users.id')

                    ->select('companies.id', 'companies.company_name', 'companies.tin', 'companies.vrn', 'companies.phone_number', 'companies.email', 'companies.website_link', 'companies.company_logo', 'companies.address',
                        'users.first_name', 'users.middle_name', 'users.last_name', 'users.email', 'companies.created_at')
                        ->where('companies.user_id', '=', $transporter_id)->count();

                    $transporterTrucks = DB::table('trucks')
                        ->join('companies', 'trucks.company_id', '=', 'companies.id')
                        ->join('users', 'trucks.user_id', '=', 'users.id')

                        ->select('trucks.id', 'trucks.truck_number', 'trucks.trailer_number', 'trucks.dengla_number', 'trucks.tonnage', 'trucks.container_number', 'trucks.driver_full_name', 'trucks.driver_phone_number', 'trucks.driver_licence_number', 'trucks.driver_passport_number', 'trucks.passport_attachment', 'trucks.licence_attachment',
                        'users.first_name', 'users.middle_name', 'users.last_name', 'users.email', 'companies.company_name', 'trucks.created_at')
                        ->where('companies.user_id', '=', $transporter_id)->get();

                        $transporterchart = Charts::database($transporterTrucks, 'bar', 'highcharts')
                        ->setTitle('All Trucks Chart')
                        ->setElementLabel("Trucks")
                        ->setLabels("trucks")
                        ->setDimensions(1000, 500)
                        ->setResponsive(true)
                        ->groupByMonth(date('Y'), true);
            // TRANSPORTER SIDE


            // CUSTOMER SIDE
            $customerPrivilage = Auth::user()->id;

            $financeInvoiceCount = DB::table('finances')
                ->join('users', 'finances.customer_id', '=', 'users.id')
                ->join('trucks', 'finances.truck_id', '=', 'trucks.id')

                ->select('finances.id', 'finances.tonnage', 'finances.invoice_number', 'finances.price_per_tonnage', 'finances.commodity_description', 'finances.advance_payment', 'finances.balance_payment', 'finances.waiting_charges', 'finances.loading_place', 'finances.status', 'finances.arrived_date', 'finances.loaded_date', 'finances.dispatch_date', 'finances.current_position', 'finances.destination', 'finances.remarks',
                 'users.first_name', 'users.middle_name', 'users.last_name', 'users.email',
                 'trucks.truck_number', 'trucks.trailer_number', 'trucks.dengla_number', 'trucks.container_number', 'trucks.driver_full_name', 'trucks.driver_phone_number', 'trucks.driver_licence_number', 'trucks.driver_passport_number', 'trucks.passport_attachment', 'trucks.licence_attachment',
                 'finances.created_at')
                 ->where('finances.customer_id', '=', $customerPrivilage)->count();

                //  return json_encode($financeInvoiceCount);

                $customerInvoiceChart = DB::table('finances')
                ->join('users', 'finances.customer_id', '=', 'users.id')
                ->join('trucks', 'finances.truck_id', '=', 'trucks.id')

                ->select('finances.id', 'finances.tonnage', 'finances.invoice_number', 'finances.price_per_tonnage', 'finances.commodity_description', 'finances.advance_payment', 'finances.balance_payment', 'finances.waiting_charges', 'finances.loading_place', 'finances.status', 'finances.arrived_date', 'finances.loaded_date', 'finances.dispatch_date', 'finances.current_position', 'finances.destination', 'finances.remarks',
                 'users.first_name', 'users.middle_name', 'users.last_name', 'users.email',
                 'trucks.truck_number', 'trucks.trailer_number', 'trucks.dengla_number', 'trucks.container_number', 'trucks.driver_full_name', 'trucks.driver_phone_number', 'trucks.driver_licence_number', 'trucks.driver_passport_number', 'trucks.passport_attachment', 'trucks.licence_attachment',
                 'finances.created_at')
                 ->where('finances.customer_id', '=', $customerPrivilage)->get();

                        $customerchart = Charts::database($customerInvoiceChart, 'bar', 'highcharts')
                        ->setTitle('All Invoice Finance')
                        ->setElementLabel("Invoices")
                        ->setLabels("invoice")
                        ->setDimensions(1000, 500)
                        ->setResponsive(true)
                        ->groupByMonth(date('Y'), true);
            // CUSTOMER SIDE



            return view('home')
            ->with('permissionCount', $permissionCount)
            ->with('userCount', $userCount)
            ->with('roleCount', $roleCount)
            ->with('companyregisteredCount', $companyregisteredCount)
            ->with('totaltrucksCount', $totaltrucksCount)
            ->with('chart', $chart)
            ->with('piechart', $piechart)
            ->with('transporterchart', $transporterchart)
            ->with('customerchart', $customerchart)
            ->with('truckByTransporterCount', $truckByTransporterCount)
            ->with('companyByTransporterCount', $companyByTransporterCount)
            ->with('totalfinanceCount', $totalfinanceCount)
            ->with('financeInvoiceCount', $financeInvoiceCount);
    }
}
