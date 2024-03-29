<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Finance;
use App\Company;
use App\Truck;
use App\UsersRole;
use DB;
use Auth;
use App\ActivityLog;

class FinancesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $this->middleware(function ($request, $next) {
            if (\Auth::user()->can('view_company')) {
                return $next($request);
            }
            return redirect()->back();
        });


        $singleUser = Auth::user()->id;

        $financeData = DB::table('finances')
            ->join('users', 'finances.customer_id', '=', 'users.id')
            ->join('trucks', 'finances.truck_id', '=', 'trucks.id')

            ->select('finances.id', 'finances.tonnage', 'finances.invoice_number', 'finances.price_per_tonnage', 'finances.commodity_description', 'finances.advance_payment', 'finances.balance_payment', 'finances.waiting_charges', 'finances.loading_place', 'finances.status', 'finances.arrived_date', 'finances.loaded_date', 'finances.dispatch_date', 'finances.current_position', 'finances.destination', 'finances.remarks',
             'users.first_name', 'users.middle_name', 'users.last_name', 'users.email',
             'trucks.truck_number', 'trucks.trailer_number', 'trucks.dengla_number', 'trucks.container_number', 'trucks.driver_full_name', 'trucks.driver_phone_number', 'trucks.driver_licence_number', 'trucks.driver_passport_number', 'trucks.passport_attachment', 'trucks.licence_attachment',
             'finances.created_at')
             ->where('finances.customer_id', '=', $singleUser)->get();

        // return json_encode($financeData);


        return view('manageFinance.viewInvoice')->with('financeDatas', $financeData);
    }


    public function allinvoice()
    {
        $financeData = DB::table('finances')
            ->join('users', 'finances.customer_id', '=', 'users.id')
            ->join('trucks', 'finances.truck_id', '=', 'trucks.id')

            ->select('finances.id', 'finances.tonnage', 'finances.invoice_number', 'finances.price_per_tonnage', 'finances.commodity_description', 'finances.advance_payment', 'finances.balance_payment', 'finances.waiting_charges', 'finances.loading_place', 'finances.status', 'finances.arrived_date', 'finances.loaded_date', 'finances.dispatch_date', 'finances.current_position', 'finances.destination', 'finances.remarks',
             'users.first_name', 'users.middle_name', 'users.last_name', 'users.email',
             'trucks.truck_number', 'trucks.trailer_number', 'trucks.dengla_number', 'trucks.container_number', 'trucks.driver_full_name', 'trucks.driver_phone_number', 'trucks.driver_licence_number', 'trucks.driver_passport_number', 'trucks.passport_attachment', 'trucks.licence_attachment',
             'finances.created_at')->get();

            //  return json_encode($financeData);

        return view('manageFinance.viewAllInvoice')->with('financeDatas', $financeData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->middleware(function ($request, $next) {
            if (\Auth::user()->can('create_invoice')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $trucks = DB::table('trucks')
            ->join('companies', 'trucks.company_id', '=', 'companies.id')
            ->join('users', 'trucks.user_id', '=', 'users.id')

            ->select('trucks.id', 'trucks.truck_number', 'trucks.trailer_number', 'trucks.dengla_number', 'trucks.tonnage', 'trucks.container_number', 'trucks.driver_full_name', 'trucks.driver_phone_number', 'trucks.driver_licence_number', 'trucks.driver_passport_number', 'trucks.passport_attachment', 'trucks.licence_attachment',
            'users.first_name', 'users.middle_name', 'users.last_name', 'companies.company_name', 'trucks.created_at')
            ->get();


        $customers = DB::table('users_roles')
        ->join('roles', 'users_roles.role_id', '=', 'roles.id')
        ->join('users', 'users_roles.user_id', '=', 'users.id')

        ->select('roles.slug', 'roles.name',
        'users.first_name', 'users.middle_name', 'users.last_name', 'users.email')
        ->where('roles.name', '=', "customer")->get();

        return view('manageFinance.createInvoice')->with('trucks', $trucks)->with('customers', $customers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->middleware(function ($request, $next) {
            if (\Auth::user()->can('create_invoice')) {
                return $next($request);
            }
            return redirect()->back();
        });
        $this->validate(request(), [
            'tonnage' => 'required',
            'invoice_number' => 'required',
            'price_per_tonnage' => 'required',
            'commodity_description' => 'required',
        ]);


        $customer = DB::table('users_roles')
        ->join('roles', 'users_roles.role_id', '=', 'roles.id')
        ->join('users', 'users_roles.user_id', '=', 'users.id')

        ->select('roles.slug', 'roles.name',
        'users.id', 'users.first_name', 'users.middle_name', 'users.last_name', 'users.email')
        ->where('users.first_name', '=',$request->user_id )->first();

        $truck =  Truck::where('truck_number', $request->truck_id)->first();

        $waitingCharges = ($request->waiting_charges * 150);

        $totalAmount = ($request->tonnage * $request->price_per_tonnage);

        $balancePayment = (($totalAmount + $waitingCharges) - $request->advance_payment);

        $invoice = new Finance();
        $invoice->tonnage = $request->tonnage;
        $invoice->invoice_number = $request->invoice_number;
        $invoice->price_per_tonnage = $request->price_per_tonnage;
        $invoice->commodity_description = $request->commodity_description;
        $invoice->advance_payment = $request->advance_payment;
        $invoice->balance_payment = $balancePayment;
        $invoice->waiting_charges = $waitingCharges;


        // $invoice->payment_received_from = $request->$payment_received_from;
        // $invoice->payment_date = $request->$payment_date;
        // $invoice->pod_status = $request->$pod_status;
        // $invoice->pod_attached_shared = $request->$pod_attached_shared;
        // $invoice->attached_file_paid = $request->$attached_file_paid;


        // $invoice->loading_place = $request->loading_place;
        $invoice->status = $request->status;
        $invoice->arrived_date = $request->arrived_date;
        $invoice->loaded_date = $request->loaded_date;
        $invoice->dispatch_date = $request->dispatch_date;
        $invoice->current_position = $request->current_position;

        // $invoice->gprs_coordinate_point = $request->gprs_coordinate_point;

        $invoice->destination = $request->destination;
        $invoice->remarks = $request->remarks;
        $invoice->customer_id = $customer->id;
        $invoice->truck_id = $truck->id;
        $invoice->system_user_id = Auth::user()->id;
        $st = $invoice->save();

        if (!$st) {
            return redirect()->back()->with('message', 'Failed to insert Invoice data');
        } else {
            return redirect()->back()->with('message', 'Invoice is successfully added');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->middleware(function ($request, $next) {
            if (\Auth::user()->can('edit_truck')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $invoice = Finance::findOrFail($id);

        $alltrucks = DB::table('trucks')
            ->join('companies', 'trucks.company_id', '=', 'companies.id')
            ->join('users', 'trucks.user_id', '=', 'users.id')

            ->select('trucks.id', 'trucks.truck_number', 'trucks.trailer_number', 'trucks.dengla_number', 'trucks.tonnage', 'trucks.container_number', 'trucks.driver_full_name', 'trucks.driver_phone_number', 'trucks.driver_licence_number', 'trucks.driver_passport_number', 'trucks.passport_attachment', 'trucks.licence_attachment',
            'users.first_name', 'users.middle_name', 'users.last_name', 'companies.company_name', 'trucks.created_at')
            ->get();


        $customers = DB::table('users_roles')
        ->join('roles', 'users_roles.role_id', '=', 'roles.id')
        ->join('users', 'users_roles.user_id', '=', 'users.id')

        ->select('roles.slug', 'roles.name',
        'users.first_name', 'users.middle_name', 'users.last_name', 'users.email')
        ->where('roles.name', '=', "customer")->get();

        return view('manageFinance.editInvoice')->with('invoices', $invoice)->with('customers', $customers)->with('alltrucks', $alltrucks);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->middleware(function ($request, $next) {
            if (\Auth::user()->can('update_invoice')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $invoice = Finance::findOrFail($id);
        $this->validate(request(), [
            'tonnage' => 'required',
            'invoice_number' => 'required',
            'price_per_tonnage' => 'required',
            'commodity_description' => 'required',
        ]);


        $customer = DB::table('users_roles')
        ->join('roles', 'users_roles.role_id', '=', 'roles.id')
        ->join('users', 'users_roles.user_id', '=', 'users.id')

        ->select('roles.slug', 'roles.name',
        'users.id', 'users.first_name', 'users.middle_name', 'users.last_name', 'users.email')
        ->where('users.first_name', '=',$request->user_id )->first();

        $truck =  Truck::where('truck_number', $request->truck_id)->first();

        $waitingCharges = ($request->waiting_charges * 150);

        $totalAmount = ($request->tonnage * $request->price_per_tonnage);

        $balancePayment = (($totalAmount + $waitingCharges) - $request->advance_payment);


        $invoice->tonnage = $request->tonnage;
        $invoice->invoice_number = $request->invoice_number;
        $invoice->price_per_tonnage = $request->price_per_tonnage;
        $invoice->commodity_description = $request->commodity_description;
        $invoice->advance_payment = $request->advance_payment;
        $invoice->balance_payment = $balancePayment;
        $invoice->waiting_charges = $waitingCharges;


        // $invoice->payment_received_from = $request->$payment_received_from;
        // $invoice->payment_date = $request->$payment_date;
        // $invoice->pod_status = $request->$pod_status;
        // $invoice->pod_attached_shared = $request->$pod_attached_shared;
        // $invoice->attached_file_paid = $request->$attached_file_paid;


        // $invoice->loading_place = $request->loading_place;
        $invoice->status = $request->status;
        $invoice->arrived_date = $request->arrived_date;
        $invoice->loaded_date = $request->loaded_date;
        $invoice->dispatch_date = $request->dispatch_date;
        $invoice->current_position = $request->current_position;

        // $invoice->gprs_coordinate_point = $request->gprs_coordinate_point;

        $invoice->destination = $request->destination;
        $invoice->remarks = $request->remarks;
        $invoice->customer_id = $customer->id;
        $invoice->truck_id = $truck->id;
        $invoice->system_user_id = Auth::user()->id;
        $st = $invoice->save();

        if (!$st) {
            return redirect()->back()->with('message', 'Failed to Update invoice data');
        } else {
            return redirect('/view/invoices')->with('message', 'Invoice is successfully updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $this->middleware(function ($request, $next) {
            if (\Auth::user()->can('delete_finance_invoice')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $uid = \Auth::id();
        $invoice = Finance::findOrFail($id);
        $invoice->delete();
        ActivityLog::where('changetype', 'Delete Finance Invoice')->update(['user_id' => $uid]);


        $request->session()->flash('message', 'Finance Invoice is successfully deleted');
        return back();
    }
}
